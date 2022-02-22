let id = null;

async function getPosts() {

	let res = await fetch('http://php.docker.localhost:8000/api/v1/posts');
    let data = await res.json();
    let posts = data.data;

	document.querySelector('.all-box').innerHTML = '';

	posts.forEach(post => {
		document.querySelector('.all-box').innerHTML += `
		<div class="box">
			<p>Post title - ${post.post_title}</p>
			<p id="user">UserId - ${post.worker_id} </p>
            <p id="comment">CommentId - ${post.comment_id} </p>
			<p>Content - ${post.post_content}</p>
			<button onclick="removePost(${post.id})">Delete</button>
			<button onclick="changePost(
                '${post.id}',
                '${post.worker_id}',
                '${post.comment_id}',
                '${post.post_title}',
                '${post.post_content}'
                )">Change post</button>
		</div>
		`
	});
}

async function addPost() {

	const postTitle = document.getElementById('postTitle').value;
	const userId = document.getElementById('userId').value;
    const commentId = document.getElementById('commentId').value;
	const content = document.getElementById('content').value;

    if (postTitle === '' || userId === '' || content === '' || commentId === '') {

		alert('Fill in all the fields');

		return;
	}

	let formData = new FormData();
	formData.append('worker_id', userId);
    formData.append('comment_id', commentId);
	formData.append('post_title', postTitle);
    formData.append('post_content', content);


	const res = await fetch('http://php.docker.localhost:8000/api/v1/posts', {
		method: 'POST',
		body: formData
	});

	const data = await res.json();

	if (data.success === true) {
		await getPosts();
	}

}

async function removePost(id) {

	const res = await fetch(`http://php.docker.localhost:8000/api/v1/posts/${id}`, {
		method: "DELETE"
   });

	const data = await res.json();

    if (data.success === true) {
		await getPosts();
	}
}



async function changePost(sid, userId, commentId ,title, content) {

	id = sid;
    document.getElementById('userIdChange').value = userId;
    document.getElementById('commentIdChange').value = commentId;
	document.getElementById('postTitleChange').value = title;
    document.getElementById('contentChange').value = content;
}

async function updatePost() {

    const userId = document.getElementById('userIdChange').value;
    const commentId = document.getElementById('commentIdChange').value;
	const postTitle = document.getElementById('postTitleChange').value;
    const postContent = document.getElementById('contentChange').value;

	const data = {
        worker_id: userId,
        comment_id: commentId,
		post_title: postTitle,
		post_content: postContent
    };

    const res = await fetch(`http://php.docker.localhost:8000/api/v1/posts/${id}`, {
      headers : {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
      },
		method: "PUT",
		body: JSON.stringify(data)
    })

    let resData = await res.json();

	if (resData.success === true) {
		await getPosts();
    }

}

getPosts();
