<?php 
    require_once('model/fields.php');
    require_once('model/validate.php');
    
    $validate = new Validate();
    $fields = $validate->getFields();
    $fields->addField('password', 'Must 8 character.');
    $fields->addField('phone', "The phone number has 10 digits and starts by 0");
    $fields->addField('email', 'Must be a valid email address.');
    $fields->addField('hear');
    $fields->addField('like');
    $fields->addField('comment');

    $action = filter_input(INPUT_POST, 'action');
    if ($action === NULL) {
          include 'view/register.php';
    } else {
        $action = strtolower($action);
    }

    switch ($action) {
        case 'submit':
            $phone = trim(filter_input(INPUT_POST, 'phone'));
            $email = trim(filter_input(INPUT_POST, 'email'));
            $password=trim(filter_input(INPUT_POST, 'password'));
            $hear= filter_input(INPUT_POST, 'hear');
            $like=filter_input(INPUT_POST, 'like');
            $comment=filter_input(INPUT_POST, 'comment');

            $validate->text('hear', $hear);
            $validate->text('like', $like);
            $validate->text('comment', $comment);
            $validate->text('password', $password, true, 8);
            $validate->phone('phone', $phone);
            $validate->email('email', $email);

            if ($fields->hasError()) {
                include 'view/register.php';
            } else {
                include 'view/success.php';
            }
            break;
    }
?>