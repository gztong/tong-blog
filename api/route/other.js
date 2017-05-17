var db = require('../config/mongo_database');

exports.yj_verify = function(req, res) {
	var answer = req.body.answer || '';
	
	if (answer == '') { 
		return res.send(401); 
	}

	if(answer == "野菊花") {
		return res.json({isPassed: true, url: "https://www.google.com"});
	}else {
		return res.json({isPassed: false, url: "https://www.baidu.com"});
	}


	// db.userModel.findOne({username: username}, function (err, user) {
	// 	if (err) {
	// 		console.log(err);
	// 		return res.send(401);
	// 	}

	// 	if (user == undefined) {
	// 		return res.send(401);
	// 	}
		
	// 	user.comparePassword(password, function(isMatch) {
	// 		if (!isMatch) {
	// 			console.log("Attempt failed to login with " + user.username);
	// 			return res.send(401);
 //            }

	// 		var token = jwt.sign({id: user._id}, secret.secretToken, { expiresInMinutes: tokenManager.TOKEN_EXPIRATION });
			
	// 		return res.json({token:token});
	// 	});

	// });
};
