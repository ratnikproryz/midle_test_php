<?php include('header.php')?>
<main>
    <form action="." method="post">
        <fieldset>
            <legend>Account Information</legend>
            <label >Email:</label>
            <input type="text" name="email">
            <?php echo $fields->getField('email')->getHTML(); ?><br> 

            <label >Password:</label>
            <input type="password" name="password">
            <?php echo $fields->getField('password')->getHTML(); ?><br>         
            <label >Phone Number:</label>
            <input type="text" name="phone"> 
            <?php echo $fields->getField('phone')->getHTML(); ?><br>         
        </fieldset>
        <fieldset>
            <legend>Settings</legend>
            <label>How did you hear about us?</label><?php echo $fields->getField('hear')->getHTML(); ?><br>
            <input type="radio" id= "hear1" name="hear" value="Search engine">  
            <label for="hear1">Search engine</label><br>
            <input type="radio" id= "hear2" name="hear" value="Word of mounth">
            <label for="hear2">Word of mounth</label><br>
            <input type="radio" id= "hear3" name="hear" value="Other">
            <label for="hear3">Other</label><br> 

            <label>Would you like to receive announcements bout new product and special offers</label>
            <?php echo $fields->getField('like')->getHTML()."</br>"; ?>
            <input id='like' type="checkbox" name= 'like'>
            <label for="like">YES, I'd like  to receive announcements bout new product and special offers</label><br>

            <label >Contact via</label>
            <select name="contact" id="">
                <option value="email">Email</option>
                <option value="email">Phone</option>
                <option value="message">Text message</option>
            </select>

            <br>
            <label for="comment">Comments:</label><br>
            <textarea id="comment" name="comment" style="width: 300px; height: 100px"></textarea>
            <?php echo $fields->getField('comment')->getHTML();  ?>
        </fieldset>
        <br>
        <input type="submit" name="action" value="Submit">
    </form> 
</main>