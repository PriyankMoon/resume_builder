# resume_builder


Create this Similar Database for the project to work 

datase name  = "resume_builder"

1st table ="users" 

                            Note : Create the Table users then jump to SQl and paste this 


    CREATE TABLE `users` (`id` int(11) NOT NULL,`full_name` varchar(250) NOT NULL,`email_id` varchar(250) NOT NULL,`password` varchar(250) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


    ALTER TABLE `users` ADD PRIMARY KEY (`id`),ADD UNIQUE KEY `email_id` (`email_id`);


    ALTER TABLE `users`MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



2nd table ="resumes"
{

    id = Primary Key Auto Incremented int(11);

    user_id = int(11);

    full_name = varchar(250);

    email_id = varchar(250);

    mobile_no = varchar(250);

    personal_link = varchar(250);

    dob = varchar(20);

    gender = varchar(50);

    religion = varchar(50);

    nationality = varchar(50);

    marital_status = varchar(50);

    hobbies = varchar(250);

    languages = varchar(250)

    address = text;

    objective = text;

    slug = varchar(250);

    updated_at = int(20);

    resume_title = varchar(250);

    background = varchar(250);

    font = varchar(250);

}

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
      