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