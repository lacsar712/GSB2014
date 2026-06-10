// 图片放大模态框
function showImageModal(tupian, mingcheng) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const caption = document.getElementById('caption');

    modal.style.display = 'block';
    modalImg.src = 'images/' + tupian;
    caption.innerHTML = mingcheng;
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'none';
}

// 添加京剧模态框
function showAddModal() {
    const modal = document.getElementById('addModal');
    modal.style.display = 'block';
}

function closeAddModal() {
    const modal = document.getElementById('addModal');
    modal.style.display = 'none';
}

// 编辑京剧模态框
function showEditModal(jingju) {
    const modal = document.getElementById('editModal');
    document.getElementById('edit_id').value = jingju.id;
    document.getElementById('edit_mingcheng').value = jingju.mingcheng;
    document.getElementById('edit_jieshao').value = jingju.jieshao;
    document.getElementById('edit_tupian').value = jingju.tupian;
    modal.style.display = 'block';
}

function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.style.display = 'none';
}

// 删除确认
function confirmDelete(id, mingcheng) {
    if (confirm('确定要删除《' + mingcheng + '》吗？此操作不可恢复！')) {
        window.location.href = 'jingju_shanchu.php?id=' + id;
    }
}

// 点击模态框外部关闭
window.onclick = function (event) {
    const imageModal = document.getElementById('imageModal');
    const addModal = document.getElementById('addModal');
    const editModal = document.getElementById('editModal');

    if (event.target == imageModal) {
        closeImageModal();
    }
    if (event.target == addModal) {
        closeAddModal();
    }
    if (event.target == editModal) {
        closeEditModal();
    }
}

// 自动隐藏成功/错误消息
document.addEventListener('DOMContentLoaded', function () {
    const messages = document.querySelectorAll('.success-message, .error-message');
    messages.forEach(function (message) {
        setTimeout(function () {
            message.style.transition = 'opacity 0.5s ease';
            message.style.opacity = '0';
            setTimeout(function () {
                message.remove();
            }, 500);
        }, 3000);
    });
});
