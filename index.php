<?php


#declere constant
define("FOLDER_PHP_FUNCTIONS", 'PHP/');
define("FILE_PHP_FUNCTION", FOLDER_PHP_FUNCTIONS . "function.php");
define("text.txt_PHP_FUNCTION", FOLDER_PHP_FUNCTIONS . "textFile.php");
#import the php commin function file
require_once (FILE_PHP_FUNCTION);
#heder to send the expire date
header("Expires: Sat, 06 Mar 2021 08:00:00 GMT");
//set_error_handler("manageError");
//set_exception_handler("manageExceptions");

    #this blockof code must place before the html code because it works with headers
    #check if the save button has been clicked
    if(isset($_POST["login"]))
    {
        #validate should go here
            createCookie();
               
    }
    else 
    {
        #if user try to logout
        if(isset($_POST["logout"]))
        {
            deleteCookie();
        }
        else
        {
            #check....
            readCookie();  
        }

            
    }

//put your code here to create website
createPageHeder("Home Page");
echo 'Welcom to my website';


#the user is using the following browser
echo $_SERVER["HTTP_USER_AGENT"];


$companies = array("Microsoft", "Apple", "RedHat", "Kasra", "Dragon", "Resiliance");

createList($companies);
createForm();
TitlePath();
colorText();

            #the rest of the cookie code must be inside the body
            if($firstname =="")
            {
                echo "You need to be logged in to view this page";
                    ?>
                    <form action="index.php" method="post">

                            <p>
                            <label>Login:</label><br>
                            <input type="text" name="firstname" <br>
                            <span style="color: red">

                            </span>
                        </p>
                        <input type="submit" value="Login" name="login">
                    </form>
                    <?php
            }
            else
            {
                echo "Welcome to You " . $firstname;
                    ?>
                    <form action="index.php" method="post">
                        <input type="submit" value="Logout" name="logout">
                    </form>
                    <?php
            }
            

createPageFooter();


?>