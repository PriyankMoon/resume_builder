# resume_builder


Create this Similar Database for the project to work 

datase name  = "resume_builder"

1st table ="users" 

Note : Create the Table users then jump to SQl and paste this 


    CREATE TABLE `users` (`id` int(11) NOT NULL,`full_name` varchar(250) NOT NULL,`email_id` varchar(250) NOT NULL,`password` varchar(250) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


    ALTER TABLE `users` ADD PRIMARY KEY (`id`),ADD UNIQUE KEY `email_id` (`email_id`);


    ALTER TABLE `users`MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



2nd table ="resumes"

Note : Create the Table resumes then jump to SQl and paste this 

    CREATE TABLE `resumes` (`id` int(11) NOT NULL,`user_id` int(11) NOT NULL,`full_name` varchar(250) NOT NULL`email_id` varchar(250) NOT NULL,`mobile_no` varchar(20) NOT NULL,`personal_link` varchar(250) NOT NULL,`dob` varchar(20) NOT NULL,`gender` varchar(50) NOT NULL,`religion` varchar(50) NOT NULL,`nationality` varchar(50) NOT NULL,`marital_status` varchar(50) NOT NULL,`hobbies` varchar(250) NOT NULL,`languages` varchar(250) NOT NULL,`address` text NOT NULL,`objective` text NOT NULL,`slug` varchar(250) NOT NULL,`updated_at` int(20) NOT NULL,`resume_title` varchar(250) NOT NULL,`background` varchar(250) NOT NULL DEFAULT '''''',`font` varchar(250) NOT NULL DEFAULT '''Poppins'', sans-serif') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
    
    ALTER TABLE `resumes`ADD PRIMARY KEY (`id`);
    
    ALTER TABLE `resumes`MODIFY `id`int(11) NOT NULL AUTO_INCREMENT,;



3rd table ="experiences"
{
 
    id = Primary Key Auto Incremented int(11);

    resume_id = int(11);

    position = varchar(250);

    company = varchar(250);

    job_desc = text;

    started = varchar(250);

    ended = varchar(250);

}

4th table ="educations"
{

    id = Primary Key Auto Incremented int(11);

    resume_id = int(11);	

    institute = varchar(250);	

    course = varchar(250);

    started = varchar(250);

    ended = varchar(250);

}

5th table ="skills"
{

    id = Primary Key Auto Incremented int(11);	

    resume_id = int(11);

    skill = text;	

    sub_skill = varchar(250);

}
      