<!DOCTYPE html>
<html lang="en">

<head>
    <title>pickmtaani.com</title>
</head>

<body>
<p>Hi, its {{ $mailData['firstname']}} {{ $mailData['lastname']}} from {{ $mailData['service']}} service.</p>

<p>Help me out solve this problem:</p>
<p>{{ $mailData['problem']}}</p>
</body>

</html>