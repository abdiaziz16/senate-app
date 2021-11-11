<h1>Relevant Files/Information:</h1>
<H4>Database Information</H4>
<p>The application is using a DB table called senators</p>
<p>Migration for senators table can be found in the migrations folder</p>
<p>The model for the table can be found at app\Models</p>

<H4>API endpoint Information</H4>
<p>Route (routes/api.php) : /post => pointing to emailController@emailSenator </p>
<p>Example JSON for what the API expects</p>
    <code>
         {
             "senator_id": "2",
             "sender_last_name": "FOO",
             "sender_email" : "bar@foo.com",
             "message": "Senator, please vote no, on bill 324 that is coming to floor this session"
         }
    </code>
<H4>Controller & Validator</H4>
<p>Controler: emailController.php</p>
<p>Data validation takes place in the Request class: app\Http\Requests\SendEmailRequest.php</p>
<H4>View</H4>
<p>A simple view for the email can be found in the views folder: mail.blade.php</p>
<H4>ENV setting(s)</H4>
<p>Please see .env file for the email configuration info. This application was tested using GMAIL</p>




