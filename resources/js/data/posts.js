const categories = ['hot', 'recent', 'owner', 'verified']

const posts = []

for (let i = 1; i <= 32; i++) {
    posts.push({
        id: i,
        title: `BĐS #${i} - Dự án hấp dẫn`,
        description: `Mô tả chi tiết cho bất động sản số ${i}. Diện tích rộng, pháp lý rõ ràng.`,
        image: `https://maisoninterior.vn/wp-content/uploads/2025/02/mau-van-phong-lam-viec-dep-04.jpg`,
        price: `${(2 + Math.random() * 6).toFixed(1)} tỷ`,
        phone: `090${i.toString().padStart(7, '0')}`,
        category: categories[i % 4]
    })
}

export default posts
