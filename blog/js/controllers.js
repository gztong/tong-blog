appControllers.controller('HomeCtrl', ['$scope', '$http', 'HttpService',
    function HomeCtrl($scope, $http, HttpService) {
      $scope.sendMessage = function() {
          // check valid
          var valid = validateInput($scope.msg.name, $scope.msg.mail, $scope.msg.text);
          if(valid){
            $http({
                method : 'POST',
                url : './ajax/sendMessage.php',
                data : $scope.msg
            }).success(function(response){
                alert("Successfully sent!");
            });
            // clean
            $scope.msg = {};        
          }
      };

    function validateInput(name, email, msg) {
        if (name==null || name=="",email==null || email=="",msg==null || msg==""){
          alert("Please Fill All Required Field");
          return false;
        }
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(re.test(email)){
          return true;
        }else{
          alert("Please Input Valid Email.");
          return false;
        }
    };

      HttpService.postService('./ajax/getData.php?table='+'projects').then(function (data) {
        $scope.projects = data;
      });
      HttpService.postService('./ajax/getData.php?table='+'experiences').then(function (data) {
        $scope.experiences = data;
      });

}]);

appControllers.controller('PostListCtrl', ['$scope', '$sce', 'PostService',
    function PostListCtrl($scope, $sce, PostService) {

        $scope.posts = [];

        PostService.findAllPublished().success(function(data) {
            for (var postKey in data) {
                data[postKey].content = $sce.trustAsHtml(data[postKey].content);
            }

            $scope.posts = data;            
        }).error(function(data, status) {
            console.log(status);
            console.log(data);
        });
    }
]);

appControllers.controller('PostViewCtrl', ['$scope', '$routeParams', '$location', '$sce', 'PostService', 'LikeService',
    function PostViewCtrl($scope, $routeParams, $location, $sce, PostService, LikeService) {

        $scope.post = {};
        var id = $routeParams.id;

        $scope.isAlreadyLiked = LikeService.isAlreadyLiked(id);

        PostService.read(id).success(function(data) {
            data.content = $sce.trustAsHtml(data.content);
            $scope.post = data;
        }).error(function(data, status) {
            console.log(status);
            console.log(data);
        });

        //Like a post
        $scope.likePost = function likePost() {
            if (!LikeService.isAlreadyLiked(id)) {
                PostService.like(id).success(function(data) {
                    $scope.post.likes++;
                    LikeService.like(id);
                    $scope.isAlreadyLiked = true;
                }).error(function(data, status) {
                    console.log(status);
                    console.log(data);
                });
            }
        };

        //Unlike a post
        $scope.unlikePost = function unlikePost() {
            if (LikeService.isAlreadyLiked(id)) {
                PostService.unlike(id).success(function(data) {
                    $scope.post.likes--;
                    LikeService.unlike(id);
                    $scope.isAlreadyLiked = false;
                }).error(function(data, status) {
                    console.log(status);
                    console.log(data);
                });
            }
        }

    }
]);


appControllers.controller('AdminPostListCtrl', ['$scope', 'PostService', 
    function AdminPostListCtrl($scope, PostService) {
        $scope.posts = [];

        PostService.findAll().success(function(data) {
            $scope.posts = data;
        });

        $scope.updatePublishState = function updatePublishState(post, shouldPublish) {
            if (post != undefined && shouldPublish != undefined) {

                PostService.changePublishState(post._id, shouldPublish).success(function(data) {
                    var posts = $scope.posts;
                    for (var postKey in posts) {
                        if (posts[postKey]._id == post._id) {
                            $scope.posts[postKey].is_published = shouldPublish;
                            break;
                        }
                    }
                }).error(function(status, data) {
                    console.log(status);
                    console.log(data);
                });
            }
        }


        $scope.deletePost = function deletePost(id) {
            if (id != undefined) {

                PostService.delete(id).success(function(data) {
                    var posts = $scope.posts;
                    for (var postKey in posts) {
                        if (posts[postKey]._id == id) {
                            $scope.posts.splice(postKey, 1);
                            break;
                        }
                    }
                }).error(function(status, data) {
                    console.log(status);
                    console.log(data);
                });
            }
        }
    }
]);

appControllers.controller('AdminPostCreateCtrl', ['$scope', '$location', 'PostService',
    function AdminPostCreateCtrl($scope, $location, PostService) {
        $('#textareaContent').wysihtml5({"font-styles": false});

        $scope.save = function save(post, shouldPublish) {
            if (post != undefined 
                && post.title != undefined
                && post.tags != undefined) {

                var content = $('#textareaContent').val();
                if (content != undefined) {
                    post.content = content;

                    if (shouldPublish != undefined && shouldPublish == true) {
                        post.is_published = true;
                    } else {
                        post.is_published = false;
                    }

                    PostService.create(post).success(function(data) {
                        $location.path("/admin");
                    }).error(function(status, data) {
                        console.log(status);
                        console.log(data);
                    });
                }
            }
        }
    }
]);

appControllers.controller('AdminPostEditCtrl', ['$scope', '$routeParams', '$location', '$sce', 'PostService',
    function AdminPostEditCtrl($scope, $routeParams, $location, $sce, PostService) {
        $scope.post = {};
        var id = $routeParams.id;

        PostService.read(id).success(function(data) {
            $scope.post = data;
            $('#textareaContent').wysihtml5({"font-styles": false});
            $('#textareaContent').val($sce.trustAsHtml(data.content));
        }).error(function(status, data) {
            $location.path("/admin");
        });

        $scope.save = function save(post, shouldPublish) {
            if (post !== undefined 
                && post.title !== undefined && post.title != "") {

                var content = $('#textareaContent').val();
                if (content !== undefined && content != "") {
                    post.content = content;

                    if (shouldPublish != undefined && shouldPublish == true) {
                        post.is_published = true;
                    } else {
                        post.is_published = false;
                    }

                    // string comma separated to array
                    if (Object.prototype.toString.call(post.tags) !== '[object Array]') {
                        post.tags = post.tags.split(',');
                    }
                    
                    PostService.update(post).success(function(data) {
                        $location.path("/admin");
                    }).error(function(status, data) {
                        console.log(status);
                        console.log(data);
                    });
                }
            }
        }
    }
]);

appControllers.controller('AdminUserCtrl', ['$scope', '$location', '$window', 'UserService', 'AuthenticationService',  
    function AdminUserCtrl($scope, $location, $window, UserService, AuthenticationService) {

        //Admin User Controller (signIn, logOut)
        $scope.signIn = function signIn(username, password) {
            if (username != null && password != null) {
                UserService.signIn(username, password).success(function(data) {
                    AuthenticationService.isAuthenticated = true;
                    $window.sessionStorage.token = data.token;
                    $location.path("/admin");
                }).error(function(status, data) {
                    console.log(status);
                    console.log(data);
                });
            }
        }

        $scope.logOut = function logOut() {
            if (AuthenticationService.isAuthenticated) {
                
                UserService.logOut().success(function(data) {
                    AuthenticationService.isAuthenticated = false;
                    delete $window.sessionStorage.token;
                    $location.path("/");
                }).error(function(status, data) {
                    console.log(status);
                    console.log(data);
                });
            }
            else {
                $location.path("/admin/login");
            }
        }

        $scope.goToRegister = function goToRegister() {
            $location.path("/admin/register");
        }

        $scope.register = function register(username, password, passwordConfirm) {
            if (AuthenticationService.isAuthenticated) {
                $location.path("/admin");
            }
            else {
                UserService.register(username, password, passwordConfirm).success(function(data) {
                    //$scope.signIn(username, password);
                    $location.path("/admin");
                }).error(function(status, data) {
                    console.log(status);
                    console.log(data);
                });
            }
        }
    }
]);

appControllers.controller('PostListTagCtrl', ['$scope', '$routeParams', '$sce', 'PostService',
    function PostListTagCtrl($scope, $routeParams, $sce, PostService) {

        $scope.posts = [];
        var tagName = $routeParams.tagName;

        PostService.findByTag(tagName).success(function(data) {
            for (var postKey in data) {
                data[postKey].content = $sce.trustAsHtml(data[postKey].content);
            }
            $scope.posts = data;
        }).error(function(status, data) {
            console.log(status);
            console.log(data);
        });

    }
]);


appControllers.controller('yujieCtrl', ['$scope','OtherService',
    function yujieCtrl( $scope, OtherService) {
        $scope.yj = {};
        $scope.yj.info = "";
        $scope.yj_verify = function(){
            $scope.yj.info = "你还没回国吧啊喂！回去再点";

            // if($scope.yj.answer!= undefined){
            //     // pass
            //     OtherService.yj_verify($scope.yj.answer).success(function(data) {
            //         if(data.isPassed){
            //             //redirect
            //             window.location.href = data.url;

            //         }else{
            //             $scope.yj.info = data.url;
            //         }
            //     }).error(function(status, data) {
            //         console.log(status);
            //         console.log(data);
            //         $scope.yj.info = "网络可能有问题";
            //     });
            // }
        }
    }
]);



