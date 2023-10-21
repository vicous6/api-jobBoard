# api-jobBoard


# Shéma de base de donnée
![image](https://github.com/vicous6/api-jobBoard/assets/92452177/d100531f-9192-424b-8b36-4a0c79ac534f)

# Technologies
![image](https://github.com/vicous6/api-jobBoard/assets/92452177/7cc0c750-7786-442a-83a5-480cfa9b3ef5)


# Organisation du repo
![image](https://github.com/vicous6/api-jobBoard/assets/92452177/a7f6ce2b-5b27-4748-a2d7-e345e6e7a31f)


Routes le L'API
## GET
  "/getMyApplyList"    
  "/enterprises"    
  "/users"    
  "/user/{id}"    
  "/enterprise/{id}"      
  "/jobs"    
  "/job/{id}"    
  "/applyListByJobId/{id}"     
  "/applyListByUserId"    
  
## POST
  "/createApplyList/{job_id}"                                                              
  "/createUser"       
  "/createEnterprise"       
  "/createJob"      
  
## DELETE
  "/deleteMyUser"    
  "/deleteUser/{id}"   
  "/deleteEnterprise/{id}"    
  "/deleteJobById/{id}"  
  # Delete Mechanisme
 ![image](https://github.com/vicous6/api-jobBoard/assets/92452177/32477a5c-8666-4ab8-b0d0-26ef681adf82)

## PUT
  "/updateUser"    
  "/updateEnterprise"    
  "/modifyJob"    

# Security Features
 token generation    
 token authentication   
 login form validation    
 register form validation    
 PDO Sql query (SQLI)    
 htmlSpecialChars(XSS)   
 3 roles: [user,admin,promoter]   
