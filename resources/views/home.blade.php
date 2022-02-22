<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{-- CSS --}}
    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
	<title>Document</title>
</head>
<body>
	<div class="all-box">

	</div>

	<div class="add-box">
		<input id="userId" type="number" placeholder="user">
        <input id="commentId" type="number" placeholder="coment">
		<input id="postTitle" type="text" placeholder="post title">
		<input id="content" type="text" placeholder="content">
		<button onclick="addPost()">Add post</button>
	</div>

	<div class="change-box">
		<input id="userIdChange" type="number" placeholder="user">
        <input id="commentIdChange" type="number" placeholder="coment">
		<input id="postTitleChange" type="text" placeholder="post title">
		<input id="contentChange" type="text" placeholder="content">
		<button onclick="updatePost()">Change post</button>
	</div>
    {{-- JS --}}
	<script src="{{url('js/app.js')}}"></script>
</body>
</html>
