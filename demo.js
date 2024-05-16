// document
//     .getElementById("facultyFormAdd")
//     .addEventListener("submit", function (event) {
//         event.preventDefault(); // Ngăn chặn form submit mặc định

//         // Lấy dữ liệu từ form
//         var facultyID = document.getElementById("facultyID").value;
//         var facultyName = document.getElementById("facultyName").value;

//         // Gửi yêu cầu Fetch đến file PHP xử lý
//         fetch("admin.php?page=faculty", {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/x-www-form-urlencoded",
//             },
//             body:
//                 "action=facultyAdd&facultyID=" +
//                 encodeURIComponent(facultyID) +
//                 "&facultyName=" +
//                 encodeURIComponent(facultyName),
//         })
//             .then(function (response) {
//                 return response.text();
//             })
//             .then(function (data) {
//                 // Xử lý dữ liệu nhận được từ file PHP
//                 if (data === "success") {
//                     Swal.fire({
//                         position: "center",
//                         icon: "success",
//                         title: "Thêm thành công",
//                         showConfirmButton: false,
//                         timer: 2500,
//                         customClass: {
//                             title: "custom-alert-title",
//                         },
//                     });

//                     setTimeout(function () {
//                         window.location.href = "?page=faculty";
//                     }, 1500);
//                 } else if (data === "error") {
//                     Swal.fire({
//                         position: "center",
//                         icon: "error",
//                         title: "Mã khoa hoặc khoa đã tồn tại",
//                         showConfirmButton: false,
//                         timer: 2500,
//                         customClass: {
//                             title: "custom-alert-title",
//                         },
//                     });
//                 }
//             });
//     });
