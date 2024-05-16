<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SetupTest</title>
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .wrapper {
            width: 90%;
            max-width: 500px;
            margin: 2rem auto;
            padding: 0.5rem 1rem;

            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            border: 1px solid #ccc;

        }

        .header {
            margin-bottom: 0.2rem;
            margin-top: 1rem;

        }

        .inputs_sections {
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 0.5rem;
        }

        input,
        textarea {
            font-size: 1rem;
            padding: 0.5rem
        }

        .footer {
            margin-top: 1rem;
        }

        .nav {
            padding: 1rem;
            border-bottom: 1px solid #ccc;

        }

        h1 {
            font-size: 1.3rem;
            /* font-weight: normal; */
        }

        h2 {
            font-size: 1rem;
            font-weight: normal;
            margin-left: 0.4rem;
        }
    </style>
</head>

<body>

    <div class="nav">
        <h1> QuickTest </h1>
        <h2> by <a target="_blank" href="https://linkedin.com/in/nabeelalihashmi"> Nabeel Ali </a> </h2>
    </div>

    <div class="wrapper">

        <form action="tester.php">
            <div class="wrapper_inner">

                <div class='header'>
                    <input type="checkbox" id="emailcheck" name="emailcheck">
                    <label for="emailcheck">Test Email</label>
                </div>

                <div class='inputs_sections'>
                    <input type="text" name="email_host" placeholder="Host (ex. mail.domain.tld)">
                    <input type="text" name="email_port" placeholder="Port (ex. 587)">
                    <input type="text" name="email_username" placeholder="Username (Email) (ex. test@domain.tld)">
                    <input type="text" name="email_password" placeholder="Password">
                    <input type="text" name="email_security" placeholder="Security (tls/ssl)">
                    <input type="text" name="email_sender_name" placeholder="Sender Name e.g. Nabeel Ali">
                    <input type="text" name="email_receiver_name" placeholder="Receiver Name">
                    <input type="text" name="email_receiver_email" placeholder="Receiver Email">
                    <input type="text" name="email_subject" placeholder="Email Subject">
                    <textarea name="email_body" id="email_body" placeholder="Email body" cols="30" rows="3"></textarea>
                </div>

                <div class='header'>
                    <input type="checkbox" id="dbcheck" name="dbcheck" value="1">
                    <label for="dbcheck">Test Database</label>
                </div>

                <div class='inputs_sections'>
                    <input type="text" name="db_host" placeholder="Host (ex. localhost:3306)">
                    <input type="text" name="db_database" placeholder="Database">
                    <input type="text" name="db_username" placeholder="Username">
                    <input type="text" name="db_password" placeholder="Password">
                </div>

                <div class="header">
                    <input type="submit" name="submit" value="Submit">
                </div>

            </div>
        </form>
        <div class="footer">
            <a target='_blank' href="https://github.com/nabeelalihashmi/quicksetuptest"> QuickSetupTest on Github </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const checkboxEmail = document.getElementById('emailcheck');
            checkboxEmail.addEventListener('change', function() {
                const emailFields = document.querySelectorAll('input[name^="email_"]');
                emailFields.forEach(function(field) {
                    field.required = checkboxEmail.checked;
                });
            });

            const checkboxDB = document.getElementById('dbcheck');
            checkboxDB.addEventListener('change', function() {
                const dbFields = document.querySelectorAll('input[name^="db_"]');

                dbFields.forEach(function(field) {
                    field.required = dbcheck.checked;
                });
            });
        })
    </script>
</body>

</html>