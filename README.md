# yii2project (project is in master branch)
3To select a branch kindly click on the top left button mentioning branch

Client will be redirected from 
http://localhost/project/basic/web/index.php to
 http://localhost/project/basic/web/index.php?r=users/index where client can see the whole
data base table created with gii along with view , update , delete options.Above that is a 
create post button using which a client can sign up. 

Client can also register his/her record into the table and for that client has to sign up
 by clicking on the button create post where 3 details have to be submitted 
1 email
2 password
3 Access( Its a radio button which has 3 options ; user ,manager ,admin)

Once client fills the above details ,the client must sigin with the username(email)
 and password to confirm his/her identity and to register his/her own record in the table.



Client can do CRUD operations on his/her own record or any one else's record depending upon
the access level. A client can just view the record , a manager can view and update the record
,admin can view , update and delete the record .


A client can select view ,update or delete option on the table to perform CRUD operation 
but has to login with the username(email) and password of the client whose record he/she 
 wants to apply CRUD operation on .In this way the security of the registered client 
weather he/she is admin ,manager or a normal user is restored.
