// Tải dữ liệu từ API
fetch('app/Views/admin/api/fetchPost.php')
.then(response => response.json())
.then(posts => {
    let postList = document.getElementById('post-list');
    console.log(posts);
    posts.forEach(post => {
        postList.innerHTML += `
            <tr onclick="window.location.href='article.php?id=${post.id}'">
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