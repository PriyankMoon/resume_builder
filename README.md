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
    
    ALTER TABLE `resumes`MODIFY `id`int(11) NOT NULL AUTO_INCREMENT;



3rd table ="experiences"
Note : Create the Table experiences then jump to SQl and paste this 

    CREATE TABLE `experiences` (`id` int(11) NOT NULL,`resume_id` int(11) NOT NULL,`position` varchar(250) NOT NULL,
    `company` varchar(250) NOT NULL,`job_desc` text NOT NULL,`started` varchar(250) NOT NULL,`ended` varchar(250) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
    ALTER TABLE `experiences`ADD PRIMARY KEY (`id`);
    
    ALTER TABLE `experiences`MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


4th table ="educations"
Note : Create the Table educations then jump to SQl and paste this 

    CREATE TABLE `educations` (`id` int(11) NOT NULL,`resume_id` int(11) NOT NULL,`institute` varchar(250) NOT NULL,`course` varchar(250) NOT NULL,`started` varchar(250) NOT NULL,`ended` varchar(250) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
    ALTER TABLE `educations`ADD PRIMARY KEY (`id`);
    
    ALTER TABLE `educations`MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


5th table ="skills"
Note : Create the Table skills then jump to SQl and paste this 

    CREATE TABLE `skills` (`id` int(11) NOT NULL,`resume_id` int(11) NOT NULL,`skill` text NOT NULL,`sub_skill` varchar(250) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
    ALTER TABLE `skills`ADD PRIMARY KEY (`id`);
    
    ALTER TABLE `skills`MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

