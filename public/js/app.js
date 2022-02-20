let id = null;

async function getPosts() {
	let res = await fetch('http://localhost/oop_connector/index.php/posts');
	let posts = await res.json();

	document.querySelector('.all-box').innerHTML = '';

	posts.forEach(post => {
		document.querySelector('.all-box').innerHTML += `
		<div class="box">
			<p>Post title - ${post.post_title}</p>
			<p id="user">User - ${post.user_id} </p>
			<p>Content - ${post.post_text}</p>
			<a href="#" onclick="removePost(${post.post_id})">Delete</a>
			<a href="#" onclick="changePost('${post.post_id}', '${post.user_id}', '${post.post_title}', '${post.post_text}')">Change post</a>
		</div>
		`
	});

	getUser();
}

async function addPost() {
	const postTitle = document.getElementById('postTitle').value;
	const userId = document.getElementById('userId').value;
	const content = document.getElementById('content').value;

	if (postTitle === '' || userId === '' || content === '') {
		alert('Fill in all the fields');
		return;
	}

	let formData = new FormData();
	formData.append('user_id', userId);
	formData.append('post_title', postTitle);
	formData.append('post_text', content);

	const res = await fetch('http://localhost/oop_connector/index.php/posts', {
		method: 'POST',
		body: formData
	});

	const data = await res.json();

	if (data.status === true) {
		await getPosts();
	}

}

async function removePost(id) {
	const res = await fetch(`http://localhost/oop_connector/index.php/posts/${id}`, {
		method: "DELETE"
	});

	const data = await res.json();

	if (data.status === true) {
		await getPosts();
	}
}



async function changePost(sid, userId, title, content) {
	id = sid;
	document.getElementById('userIdChange').value = userId;
	document.getElementById('postTitleChange').value = title;
	document.getElementById('contentChange').value = content;
}

async function updatePost() {
	const user_id = document.getElementById('userIdChange').value;
	const post_title = document.getElementById('postTitleChange').value;
	const post_text = document.getElementById('contentChange').value;

	const data = {
		user_id: user_id,
		post_title: post_title,
		post_text: post_text
	};

	const res = await fetch(`http://localhost/oop_connector/index.php/posts/${id}`, {
		method: "PATCH",
		body: JSON.stringify(data)
	})

	let resData = await res.json();

	if (resData.status === true) {
		await getPosts();
	}
}


getPosts();
