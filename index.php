<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azrael Games</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #2980b9; 
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form {
            background: #1abc9c;
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .tab-group {
            list-style: none;
            padding: 0;
            margin: 0 0 40px 0;
            display: flex;
        }

        .tab-group li {
            width: 50%;
            text-align: center;
        }

        .tab-group li a {
            display: block;
            padding: 15px;
            background: #16a085;
            color: #fff;
            border-radius: 10px 10px 0 0;
            text-decoration: none;
            transition: .5s ease;
        }

        .tab-group .active a {
            background: #1abc9c;
        }

        .tab-content > div {
            display: none;
        }

        .tab-content > .active {
            display: block;
        }

        .field-wrap {
            position: relative;
            margin-bottom: 40px;
        }

        .field-wrap label {
            position: absolute;
            transform: translateY(6px);
            left: 13px;
            color: rgba(255, 255, 255, 0.5);
            transition: all 0.25s ease;
            pointer-events: none;
        }

        .field-wrap .active label {
            transform: translateY(-30px);
            left: 0;
            color: #fff;
            font-size: 14px;
        }

        .field-wrap input {
            font-size: 16px;
            display: block;
            width: 90%;
            padding: 10px 12px;
            background: none;
            background-image: none;
            border: 1px solid #fff;
            color: #fff;
            border-radius: 5px;
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .field-wrap input:focus {
            outline: 0;
            border-color: #3498db;
        }

        .button {
            border: 0;
            outline: none;
            border-radius: 5px;
            padding: 15px 0;
            font-size: 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .1em;
            background: #3498db;
            color: #fff;
            transition: all 0.5s ease;
            width: 100%;
            display: block;
            cursor: pointer;
        }

        .button:hover, .button:focus {
            background: #2980b9;
        }

        .forgot {
            margin-top: -20px;
            text-align: center;
            color: #fff;
        }

        .forgot a {
            color: #fff;
            text-decoration: none;
        }

        .forgot a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .form {
                padding: 20px 10px;
            }

            .field-wrap input {
                padding: 8px 10px;
            }

            .button {
                padding: 10px 0;
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<div class="form">
    <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
    </ul>

    <div class="tab-content">
        <div id="signup" class="active">
            <h1>Sign Up for Free</h1>
            <form action="reg_func.php" method="post">
                <div class="top-row">
                    <div class="field-wrap">
                       <span class="req"></span>
                        <input type="text" required autocomplete="off" name="first_name" placeholder="First Name"/>
                    </div>
                    <div class="field-wrap">
                       <span class="req"></span>
                        <input type="text" required autocomplete="off" name="last_name" placeholder="Last Name" />
                    </div>
                </div>
                <div class="field-wrap">
                   <span class="req"></span>
                    <input type="email" required autocomplete="off" name="email" placeholder="Email"/>
                </div>
                <div class="field-wrap">
                 <span class="req"></span>
                    <input type="password" required autocomplete="off" name="password" placeholder="Password"/>
                </div>
                <button type="submit" class="button button-block">Get Started</button>
            </form>
        </div>

        <div id="login">
            <h1>Welcome Back!</h1>
            <form action="log_func.php" method="post">
                <div class="field-wrap">
                <span class="req"></span>
                    <input type="email" required autocomplete="off" name="email" placeholder="Email"/>
                </div>
                <div class="field-wrap">
                    <span class="req"></span>
                    <input type="password" required autocomplete="off" name="password" placeholder="Password" />
                </div>
                <p class="forgot"><a href="#">Forgot Password?</a></p>
                <button class="button button-block">Log In</button>
            </form>
        </div>
    </div><!-- tab-content -->
</div> <!-- /form -->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function() {
    $('.form').find('input, textarea').on('keyup blur focus', function(e) {
        var $this = $(this),
            label = $this.prev('label');

        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }
        } else if (e.type === 'focus') {
            if ($this.val() === '') {
                label.removeClass('highlight');
            } else if ($this.val() !== '') {
                label.addClass('highlight');
            }
        }
    });

    $('.tab a').on('click', function(e) {
        e.preventDefault();
        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');
        target = $(this).attr('href');
        $('.tab-content > div').removeClass('active').hide();
        $(target).fadeIn(600).addClass('active');
    });
});
</script>
</body>
</html>
