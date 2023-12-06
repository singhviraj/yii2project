# yii2project (project is in master branch)

User will be redirected from http://localhost/project/basic/web/index.php to http://localhost/project/basic/web/index.php?r=users%2Findex
where user can check the database table created with gii .
User can perform CRUD operations on that database table .
User must create an account and sign into it to register into the table .
While creating the account user need to fill one out of three options which are admin , manager and user .
After creating and signing into the account user can see the whole table .
User can only see his/her own details because user have to verify his/her identity through a sign in form.
A user can  see the details if he/she has user rights .
A user can  see and update the details if he/she has manager rights .
A user can  see,update and delete the record if he/she has admin rights .
