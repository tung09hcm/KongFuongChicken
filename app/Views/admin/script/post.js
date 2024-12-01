// Tải dữ liệu từ API
fetch('index.php?controller=admin&action=managePost')
.then(response => response.json())
.then(posts => {
    let postList = document.getElementById('post-list');
    
    const currentUrl = window.location.search;
    let filteredPosts = posts.posts;

    if (currentUrl.includes('action=Menu')) {
        filteredPosts = filteredPosts.slice(0, 5);
    }

    filteredPosts.forEach(post => {
        postList.innerHTML += `
            <tr onclick="window.location.href='index.php?controller=admin&action=viewPostDetail&idPost=${post.id}'">
                <td>${post.id}</td>
                <td>${post.title}</td>
                <td class="news-content">
                    <p>${post.content}</p>
                </td>
                <td>${post.created_at}</td>
            </tr>
        `;
    });
})
.catch(error => console.error('Lỗi tải dữ liệu:', error));