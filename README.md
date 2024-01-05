# resume_builder


for a dataase 

datase name  = "resume_builder"

1st table ="users"
{

    id =int(11) Auto incremented Primary Key ;

    full_name = varchar(250);

    email_id = Unique Key varchar(250);

    password = varchar(250);

}

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
      