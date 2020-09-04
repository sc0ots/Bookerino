

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<div>
      <div>
     
      @foreach($messages as $message)
      
      <p>
      <strong>{{$message->author}} </strong>:{{$message->content}}
     </p>
      @endforeach
      </div>
      
      <div>
      <form action="send-message" method="POST">  
     {{csrf_field()}}
      name: <input type="text" name="author">
    <br>
      Content: <textarea name="content"  rows="5" style="width :100%"></textarea>
      <button  name="send" type="submit" >send</button>
      </form>
      </div>
      
  </body>

</html>