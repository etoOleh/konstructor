let id = null;

async function getPosts(){
    let res = await fetch("https://host-3:8890/api-posts");
    let posts = await res.json();

    document.querySelector('.post-list').innerHTML = "";

    posts.forEach((post) => {
        document.querySelector('.post-list').innerHTML += `

            <div class="card" style="width: 18rem" >
                    <div class="card-body">
                        <h5 class="card-title">${post.title}</h5>
                        <p class="card-text">${post.body}</p>
                        <a href="#" class="card-link">More</a>
                        <a href="#" class="card-link" onclick="removePost(${post.id})">Delete</a>
                        <a href="#" class="card-link" onclick="selectPost('${post.id}', '${post.title}', '${post.body}')">Update</a>
                    </div>
                </div>
            </div>
        `
    })
}


async function addPost(){
    const title = document.getElementById('title').value,
        body = document.getElementById('body').value;

    let formData = new FormData();
    formData.append('title', title);
    formData.append('body', body);

    const res = await fetch('https://host-3:8890/api-post', {
        method: 'POST',
        body: formData
    });

    const data = await res.json();
    
    console.log(data);

    await getPosts();

    document.getElementById("title").value = "";
    document.getElementById("body").value = "";
}

async function removePost(id){
    const res = await fetch(`https://host-3:8890/api-post/${id}`, {
        method: 'DELETE'
    });

    const data = await res.json();

    if(data.status === true){
        await getPosts();
    }

}

async function selectPost(id, title, body){
    idPost = id;
    document.getElementById('title-edit').value = title;
    document.getElementById('body-edit').value = body;
}


async function updatePost(id = idPost){
    const title = document.getElementById('title-edit').value,
    body = document.getElementById('body-edit').value;


    const data = {
        title: title,
        body: body
    };

    await fetch(`https://host-3:8890/api-post/${id}`, {
        method: "PATCH",
        body: JSON.stringify(data)
    });

    // let resData  = res.json();

    // console.log(resData);
    await getPosts();

    document.getElementById("title-edit").value = "";
    document.getElementById("body-edit").value = "";
    idPost = null;
}

getPosts();