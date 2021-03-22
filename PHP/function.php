<?php

#Revision history 
#2021-02-12      KS Gholami     Create the PHP about fole
#2021-02-17      Ks Gholami     Added the copy right
#declare content
define("MAKE_MAX_LENGHT", 10);
define("MODEL_MAX_LENGHT", 15);
define("product_MAX_LENGHT", 12);
define("Year_MIN_LENGHT", 1900);
#declare global variable
define("FOLDER_CSS_FUNCTION", 'CSS/');
define("FILE_CSS_FUNCTION", FOLDER_CSS_FUNCTION ."css.css");

define("FOLDER_IMAGES_FUNCTION", 'images/');
define("FILE_IMAGES_FUNCTION", FOLDER_IMAGES_FUNCTION ."logo.png");


 #variable for cookie
$firstname="";
function createPageHeder($TitleName)
{
    #inside the PHP 
     
     createNavigationMenu();
    #echo some Html code
    ?><!DOCTYPE html>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?php echo FILE_CSS_FUNCTION; ?>"/> 
    <?php CreateLogo(); ?>
    <html><head><meta charset="UTF-8"><title><?php echo $TitleName ?></title></head><body class="color">
            
            
                
    welcome to kasra's web page
            
    <?php    
       
}

function createNavigationMenu()
{
    #You should use constant
    ?>
            <div>
                <a href="index.php">Home Page</a>
                <a href="about.php">about Page</a>
                <a href="contact-us.php">Contact Page</a>
            </div>
    <?php
}

function CreateLogo()
{
    #echo some Html code
    ?>
            <img src="<?php echo FILE_IMAGES_FUNCTION; ?>" width="100px" height="100px" alt="Logo"/>
    <?php    
  
}


function createPageFooter()
{
    
    
    #echo some Html code
    ?>
        </body>
        <footer>
            <br><br>CopyRight Alireza Gholami (1931230)  <?php echo date('Y'); ?>
        </footer>
      </html>
    
    
    <?php    
  
}



function createForm()
{
$errorMake = "";
$errorModel = "";
$errorYear = "";
$errorStatus = "";
$errorProduct = "";
    
$Model="";
$Year="";
$make="";
$status ="";
$product ="";

  
    
    #check if the save button has been clicked
    if(isset($_POST["save"]))
    {
        $product = htmlspecialchars(trim($_POST["product"]));
        if(! $product == "")
        {
            if(! (substr($product, 0,1) == "P" ||  substr($product, 0,1) == "p"))
            {
                $errorProduct = "The first word must be P or p.";
            }
            elseif (mb_strlen($product) > product_MAX_LENGHT) 
            {
                $errorProduct ="The Product cannot contain more than ". product_MAX_LENGHT . " Character";
            }
            
            
        }
        else 
        {
            $errorProduct = "The product number can not be empty";
        }
        
        
        
        
        
        #check the make is emty
        $make = htmlspecialchars(trim($_POST["make"]));
        if($make == "")
        {
            
            $errorMake = "The make can not empty";
        }
        else
        {
            if(mb_strlen($make) > MAKE_MAX_LENGHT)
            {
                $errorMake ="The make cannot contain more than ". MAKE_MAX_LENGHT . "Character";
            }
        }
        
        #check the Model is emty
        $Model = htmlspecialchars(trim($_POST["model"]));
        if($Model == "")
        {
            
            $errorModel = "The model can not empty";
        }
        else
        {
            if(mb_strlen($Model) > MODEL_MAX_LENGHT)
            {
                $errorMake ="The model cannot contain more than ". MAKE_MAX_LENGHT . " Character";
            }
        }
        
        $status = htmlspecialchars(trim($_POST["status"]));
        if(!  isset($_POST["status"]))
        {
            
            $errorStatus = "Please select a status for the car " . $status;
        }
        else
        {
            
                $status = htmlspecialchars(trim($_POST["status"]));
                echo "BTW the status ". $status;
            
        }
        
        
        #check the Year is empty
        $Year = htmlspecialchars(trim($_POST["year"]));
        if(!is_numeric($Year))
        {
            
            $errorYear = "Please enter a numeric value bettween" . Year_MIN_LENGHT . " and"
                    . (DATE("Y") + 1);
        }
        else
        {
            if($Year < Year_MIN_LENGHT || $Year > (DATE("Y") + 1))
            {
                $errorYear = "Please enter a numeric value bettween" . Year_MIN_LENGHT . " and"
                    . (DATE("Y") + 1);
            }
        }
        
       
      
        
        #after all validation check if the errors found
        if($errorMake== "" && $errorModel== "" && $errorYear== "" && $errorStatus=="" && $errorProduct="")
        {
            header('Location: Succeed.php');
            die();
            #no error occured
            $Model="";
            $Year="";
            $make="";
            $status="";
            $product="";
             
            echo "Comgrats, You made a purchess";
        }
    }
    else 
    {
        echo "Please fill all the form.";
    }
    
    #creating form in HTML
    ?>
        <form action="index.php" method="post">
         
            <p>
            <label>Product:</label><br>
            <input type="text" name="product"  value="<?php echo $product ?>"><br>
            <span style="color: red">
                <?php echo $errorProduct; ?>
            </span>
        </p>
            
            
            
        <p>
            <label>Make:</label><br>
            <input type="text" name="make"  value="<?php echo $make ?>"><br>
            <span style="color: red">
                <?php echo $errorMake; ?>
            </span>
        </p>
            
        <p>
            <label>Model:</label><br>
            <input type="text" name="model" value="<?php echo $Model ?>"><br>
            <span style="color: red">
                <?php echo $errorModel; ?>
            </span>
        </p>
            
        <p>
            <label>Year:</label><br>
            <input type="text" name="year"  value="<?php echo $Year ?>"><br>
            <span style="color: red">
                <?php echo $errorYear; ?>
            </span>
        </p>
            
        <p>
            <label>Status:</label><br>
            <input type="radio" name="status"  value="new" <?php if($status == "new") {echo "checked";}?> />New
            <input type="radio" name="status"  value="used" <?php if($status == "Used") {echo "checked";}?> />Used
            <input type="radio" name="status"  value="unknown" <?php if($status == "Unknown") {echo "checked";}?> />Unknown
            <span style="color: red">
                <?php echo $errorStatus; ?>
            </span>
        </p>  
          
          <input type="submit" value="Save" name="save">
        </form>
    <?php
}

function createList($companies)
{
    #My Version
    ?>
    <ol>
        
            
            <?php
                for ($i = 0; $i < count($companies); $i++) {
                    ?> <li> <?php
                    echo $companies[$i];
                    ?> </li> <?php
                }

            ?>
            
        

    </ol>
    
    <?php
   
   #Version Teacher 
    /*
    echo "<ol>";
    for ($i = 0; $i < count($companies); $i++) 
    {               echo "<li>";
                    echo $companies[$i];
                    echo "</li>";
    }
    echo "</ol>";
     
     */
}


function TitlePath()
{
    ?>
    <br>  <br>Welcome
    <?php
    /*
     * #basic version
    if(isset($_GET["title"]))
    {
        echo $_GET["title"] . " ";
    }
    if(isset($_GET["firstName"]))
    {
        echo $_GET["firstName"] . " ";
    }
    if(isset($_GET["lastName"]))
    {
        echo $_GET["lastName"] . " ";
    }
    */
    #Advanced version
    echo (isset($_GET["title"]) ? $_GET["title"] : "") . " " .
         (isset($_GET["firstName"]) ? $_GET["firstName"] : "") . " " . 
         (isset($_GET["lastName"]) ? $_GET["lastName"] : "") . " " ;

}

#change the color of a text by page adress[GET]
function colorText()
{
    if(isset($_GET["color"]))
    {
        $color = htmlspecialchars($_GET["color"]);
        
        if($color == "red")
        {
            $color="text-red";
        }
        else 
        {
            if($color == "blue")
            {
                
                $color = "text-blue";
            }
            else
            {
                #default value
                $color = "text-black";
            }
        }
    }
    
    ?>
    
    <div class="<?php echo $color; ?>" >
        Your Request is completed succeessfuly
        
    </div>
    <?php
}



function manageError($errorNumber, $errorString, $errorFile, $errorLine)
{
    global $debug;
    
    #generic message for end-user
    echo "An error occured on the website. Please counsult the log for more details";
    
    #detaild info for the developers (dont use echo)
    #save this into the file insted of using echo
    if($debug == true)
    {
    echo "An error occured in the file" . $errorFile . "on line" . $errorLine 
            . " Error: $errorNumber - $errorString";
    }
    else
    {
        #save the same info in the file
    }
            die();
}

function manageExceptions($error)
{
    #generic message for end-user
    echo "\nAn exception occured on the website. Please consult the log for more details";
    
    #detailed info for developers (dont use echo)
    echo "An error occured in the file " . $error->getFile() . " On Line " .
            $error->getLine() . " Error" . $error->getMessage();
    
            die();
}
#error_reporting(0);
#error_reporting(E_ALL);


function createCookie()
{
    if(isset($_POST["firstname"]))
    {
        #set cookie and specify a time to expire
        #setcookie("firstname", htmlspecialchars($_POST["firstname"]), time() + 10);
        #because we dont use HTTPS we have to use :
        setcookie("firstname", htmlspecialchars($_POST["firstname"]), time() + 60 * 60,
                "",   "",    false,  true);
                #path #domin #secure #http
        
        #reload the page...
        header('Location: index.php');
        exit();
        
    }
}

function readCookie()
{
    #use the golobal variable named firstName"
    global $firstname;
    if(isset($_COOKIE["firstname"]))
    {
        $firstname = $_COOKIE["firstname"];
        
        #I am ACtive on website
        setcookie("firstname", $_COOKIE["firstname"] , time() + 10,
                "",   "",    false,  true);
                #path #domin #secure #http
    }
    else
    {
        $firstname = "";
    }
}

function deleteCookie()
{
    #use - sign to make the cookie already expired (in the past) 
        #set cookie and specify a time to expire
        setcookie("firstname", "", time() - 60 * 60 * 24);
    
        #reload the page...
        header('Location: index.php');
        exit();

}
    ?>
