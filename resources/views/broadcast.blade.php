<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BroadCast</title>
</head>
<body>
    <p>Check console log please.</p>
    <div id="app"></div>
</body>
<script src="{{asset('js/app.js')}}"></script>
<script>
console.log(window.Echo);
Echo.channel('demoChannel')
    .listen('SendMessage', function(e){
        console.log('Got event..');
        console.log(e);
});

var user_id = '{{Auth::id()}}';

Echo.private('App.User.'+user_id).notification((notification)=>{
    console.log(notification);
})
</script>
</html>