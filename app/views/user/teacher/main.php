<style>
.slider {
    width: 100%;
    height: 632px;
    position: relative;
    overflow: hidden;
}

.slide {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

.slide.active {
    opacity: 1;
    transition: opacity 0.3s ease-in-out;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
</style>

<div class="slider">
    <div class="slide active" id="slide-1">
        <img src="https://scontent.fsgn5-5.fna.fbcdn.net/v/t39.30808-6/441293716_735427485460054_591022293766673967_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeE7mMKp3_YxUD4Uji3jWgK40H41DGh4nDPQfjUMaHicM6JcXYIACkr32vFvXQwMMSwAXPkmopY57ogWTpiXw4r9&_nc_ohc=1fdis-0G6rsQ7kNvgGT_NO_&_nc_ht=scontent.fsgn5-5.fna&oh=00_AYCXMynCpRL4lesKP3l-biqlSa7mMeq0fpCZEG4rEVDcyA&oe=665E9E41"
            alt="slide_1">
    </div>
    <div class="slide" id="slide-2">
        <img src="https://scontent.fsgn5-9.fna.fbcdn.net/v/t39.30808-6/441281301_735427445460058_2175392543806604866_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGPpNd_E4fSzS3vmkrA00QXYIfK3HDMkvtgh8rccMyS-6N5D4fL1qWup9BiXlqkinf1Jv7wCYpale_29eXx83BG&_nc_ohc=76T16LeaPXUQ7kNvgGjLDcL&_nc_ht=scontent.fsgn5-9.fna&oh=00_AYBESBCowX6TkzVUzjZKqGQy6ecfu2qCBbvAp0A-LCYNVA&oe=665EA528"
            alt="slide_2">
    </div>
    <div class="slide" id="slide-3">
        <img src="https://scontent.fsgn5-5.fna.fbcdn.net/v/t39.30808-6/441305270_735427528793383_1535478007889633909_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGL3S5fxTUiSw9EXR6zUJ8pYoWknpDmB81ihaSekOYHzeZIPRLIFk34eK9t9BjbPuLd5mrMgcXm7G0Pm8Y33uiE&_nc_ohc=VR6bHQc-AVgQ7kNvgEQ7CSw&_nc_ht=scontent.fsgn5-5.fna&oh=00_AYApRg-dnSdATQBX4Lta-5_9Y7O2Bjnw_JWmkxvCtb8-Nw&oe=665E958F"
            alt="slide_3">
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    // Lấy danh sách các slide và box mô tả
    const slides = document.querySelectorAll(".slide");

    // biến lưu trữ slide hiện tại. ban đầu = 0
    // biến interval để lưu trữ id từng slide sử dụng để chuyển đổi giữa các slide sau một thời gian đã cài đặt
    let currentSlide = 0;
    let intervalID;

    let startAutoSlide = () => {
        intervalID = setInterval(() => {
            goToSlide((currentSlide + 1) % slides.length);
        }, 3000);
    };

    // Bắt đầu tự động chuyển slide
    startAutoSlide();

    let goToSlide = (index) => {
        // Ẩn slide hiện tại và hiển thị slide mới
        slides[currentSlide].classList.remove("active");
        slides[index].classList.add("active");

        // Cập nhật vị trí slide hiện tại
        currentSlide = index;
    };
});
</script>