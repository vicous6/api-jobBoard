<?php
require 'DELETE/deleteUserById.php';
// require 'DELETE/deleteUserByEnterpriseId.php';
require 'DELETE/deleteEnterpriseById.php';
require 'DELETE/deleteJobById.php';
require 'DELETE/deleteApplyListsByJobId.php';
require 'DELETE/deleteApplyListsByUserId.php';

require 'GET/getAllUsers.php';
require "GET/getAllEnterprises.php";
require 'GET/getAllJobs.php';

require 'GET/getUsersByEnterpriseId.php';
require 'GET/getJobsByEnterpriseId.php';


require 'GET/getUserById.php';
require 'GET/getEnterpriseById.php';
require 'GET/getJobById.php';

require 'GET/getAllApplyListsByJobId.php';


require "getDatabaseInfo.php";

require "POST/postUser.php";
require "POST/postJob.php";
require "POST/postApplyList.php";
require "POST/postEnterprise.php";

require "UPDATE/updateJob.php";
require "UPDATE/updateEnterprise.php";
require "UPDATE/updateUser.php";

require "authentication/cryptPassword.php";
require "authentication/generateToken.php";
require "GET/getTokenByUserId.php";
require "GET/getUserByUsername.php";
require "GET/getUserByEmail.php";
require "GET/getEnterpriseByName.php";

// a faire
require "POST/postUserPromoter.php";

require "UPDATE/updatePassword.php";
require "UPDATE/updateToken.php";
require "GET/getAllApplyListsByUserId.php";

require "DELETE/deleteMyUser.php";
require "GET/getMyApplyListbyUserId.php";
require "GET/getUserByToken.php";
require "authentication/validation/loginValidation.php";
require "authentication/validation/registerValidation.php";
require "authentication/validation/createJobValidation.php";
require "authentication/validation/createEnterpriseValidation.php";
require "authentication/isTokenValid.php";
require "authentication/whatRoleForThatToken.php";
require "DELETE/deleteToken.php";
require "authentication/validation/specialChars.php";