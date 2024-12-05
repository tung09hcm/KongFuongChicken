fetch("index.php?controller=cart&action=view")
  .then((response) => response.json())
  .then((data) => {
    renderOrderItems(data.products);
  });

function renderOrderItems(orderData) {
  const container = document.getElementById("order-items-container"); // Lựa chọn container nơi sẽ render các sản phẩm
  const containerMobile = document.getElementById("products-ordered-card");

  let total = 0;

  orderData.forEach((item) => {
    // Tạo phần tử div cho mỗi sản phẩm
    const productHTML = `
            <div class="big-div">
              <div class="row products-ordered-check">
              <div class="col-sm">
                  <img class="products-ordered-check-img" alt="${
                    item.name
                  }" height="100" src="${item.image_link}" width="100"/>
              </div>
              <div class="col-sm products-ordered-check-left">
                  <div>
                      <div class="d-flex align-items-center products-ordered-check-left-title">
                          <span>${item.name}</span>
                      </div>
                      <div class="text-muted products-ordered-check-left-des">
                          ${item.description}
                      </div>
                  </div>
              </div>

              <div class="col-sm products-ordered-check-right">
                <div>
                      <div class="products-ordered-check-right-price">${new Intl.NumberFormat(
                        "vi-VN"
                      ).format(Math.floor(item.price * item.quantity))}đ</div>
                      <div class="d-flex align-items-center">
                          <input type="hidden" value="${item.id}" style="display: none;">
                          <button class="btn btn-sm products-ordered-check-right-btn">
                              <i class="fa-solid fa-minus"></i>
                          </button>
                          <span class="mx-2">${item.quantity}</span>
                          <button class="btn btn-sm products-ordered-check-right-btn">
                              <i class="fa-solid fa-plus"></i>
                          </button>
                      </div>
                  </div>
              </div>
          </div>
            </div>
        `;
    const productHTMLMobile = `
            <div class="big-div">
                <div class="row products-ordered-card-info">
                    <div class="col">
                      <img class="products-ordered-check-img" alt="" height="100" src="${
                        item.image_link
                      }" width="100"/>
                    </div>
                        <div class="col products-ordered-check-left">
                            <div>
                                <div class="d-flex align-items-center products-ordered-check-left-title">
                                    <span>${item.name}</span>
                                </div>
                                <div class="text-muted products-ordered-check-left-des">${
                                  item.description
                                }</div>
                            </div>
                        </div>
                    </div>

                      <hr style="margin: 5px 0 !important;">

                    <div class="row products-ordered-card-q-p">
                        <div class="col-12 products-ordered-check-right">
                            <div class="d-flex products-ordered-check-right-card align-items-center">
                                <input type="hidden" value="${item.id}"  style="display: none;">
                                <button class="btn btn-sm products-ordered-check-right-btn2">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <span class="mx-2">${item.quantity}</span>
                                <button class="btn btn-sm products-ordered-check-right-btn2">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>

                            <div class="products-ordered-check-right-price">${new Intl.NumberFormat(
                              "vi-VN"
                            ).format(Math.floor(item.price * item.quantity))}đ</div>
                      </div>
                </div>
                      
            </div>
        `;
    // Thêm phần tử HTML vào container
    container.innerHTML += productHTML;
    containerMobile.innerHTML += productHTMLMobile;
    total += item.price * item.quantity;
  });

  const summaryContainer = document.querySelectorAll(".summary");
  summaryContainer.forEach((c) => {
    c.innerHTML += `
            <hr style="border-top: 2px solid #E5E5E5; margin-top: 0px !important; margin-bottom: 10px !important;">
            <div class="d-flex justify-content-between pb-3">
                <span>Tổng đơn hàng</span>
                <span id="total-real">${new Intl.NumberFormat("vi-VN").format(
                  Math.floor(total)
                )}</span>
            </div>
            <div class="d-flex justify-content-between pb-3">
                <span>Phí giao hàng</span>
                <span>10.000đ</span>
            </div>
            <div class="d-flex justify-content-between pb-3">
                <span>Khuyến mãi</span>
                <span id="discount">Không</span>
            </div>
            <div class="d-flex justify-content-between pb-3">
                <span>Mã</span>
                <span id="discount-code">Không</span>
            </div>
            <div class="d-flex justify-content-between total mt-2 fw-bold">
                <span>Tổng thanh toán</span>
                <span id="total">${new Intl.NumberFormat("vi-VN").format(
                  Math.floor(total + 10000)
                )}</span>
            </div>
            <hr style="border-top: 2px solid #E5E5E5; margin-top: 5px !important; margin-bottom: 5px !important;">

            <div class="delivery-details">
                <!-- Địa chỉ nhận tại nhà -->
                <h5>Phương thức nhận hàng</h5>
                <div id="home-address-section">
                    <h6>Chọn địa chỉ của bạn</h6>
                    <select id="home-address" class="form-control"></select>
                </div>

                <!-- Chọn nhà hàng -->
                <div id="store-address-section">
                    <h6>Chọn nhà hàng</h6>
                    <select id="store-address" class="form-control"></select>
                </div>
            </div>
            <hr style="border-top: 2px solid #E5E5E5; margin-top: 5px !important; margin-bottom: 5px !important;">
            <button class="btn summary-btn-checkout mt-3" onclick="pay()">Thanh toán</button>
        `;
  });
}


document.addEventListener("click", (event) => {
  // Xác định nút được nhấn có thuộc class `products-ordered-check-right-btn`
  const button = event.target.closest(".products-ordered-check-right-btn");
  if (button) {
    // Lấy phần tử cha lớn nhất chứa toàn bộ thông tin sản phẩm
    const productCard = button.closest(".big-div");

    // Lấy thẻ input chứa id sản phẩm
    const inputId = productCard.querySelector("input[type='hidden']");
    const productId = inputId?.value; // Lấy giá trị id từ input

    // Lấy div chứa số lượng và giá
    const parentDiv = button.closest(".col-sm.products-ordered-check-right");

    // Kiểm tra nút là giảm hay tăng
    const isDecrease = button.querySelector("i").classList.contains("fa-minus");

    // Lấy số lượng hiện tại
    const quantitySpan = parentDiv.querySelector("span");
    let quantity = parseInt(quantitySpan.textContent);

    // Lấy giá hiện tại (định dạng số từ nội dung text)
    const priceDiv = parentDiv.querySelector(".products-ordered-check-right-price");
    let totalPrice = parseInt(priceDiv.textContent.replace(/\D/g, "")); // Loại bỏ ký tự không phải số
    const unitPrice = totalPrice / quantity; // Giá từng đơn vị

    // Xử lý tăng/giảm số lượng
    if (isDecrease) {
      quantity = Math.max(0, quantity - 1); // Không giảm dưới 0
    } else {
      quantity++;
    }

    // Cập nhật giá tiền và số lượng
    const newTotalPrice = quantity * unitPrice; // Tổng giá mới
    priceDiv.textContent = `${new Intl.NumberFormat("vi-VN").format(newTotalPrice)}đ`;
    quantitySpan.textContent = quantity;

    // Nếu số lượng = 0, xóa div lớn
    if (quantity === 0 && isDecrease) {
      productCard.remove(); // Xóa toàn bộ div lớn
      deleteProductFromDB(productId); // Gọi hàm xóa sản phẩm với id
    } else {
      addToCart2(productId, quantity); // Gọi hàm cập nhật số lượng với id
    }
  }
});

document.addEventListener("click", (event) => {
  // Xác định nút được nhấn có thuộc class `products-ordered-check-right-btn`
  const button = event.target.closest(".products-ordered-check-right-btn2");
  if (button) {
    // Lấy phần tử cha lớn nhất chứa toàn bộ thông tin sản phẩm
    const productCard = button.closest(".big-div");

    // Lấy thẻ input chứa id sản phẩm
    const inputId = productCard.querySelector("input[type='hidden']");
    const productId = inputId?.value; // Lấy giá trị id từ input

    // Lấy div chứa số lượng và giá
    const parentDiv = button.closest(".products-ordered-card-q-p");

    // Kiểm tra nút là giảm hay tăng
    const isDecrease = button.querySelector("i").classList.contains("fa-minus");

    // Lấy số lượng hiện tại
    const quantitySpan = parentDiv.querySelector("span");
    let quantity = parseInt(quantitySpan.textContent);

    // Lấy giá hiện tại (định dạng số từ nội dung text)
    const priceDiv = parentDiv.querySelector(".products-ordered-check-right-price");
    let totalPrice = parseInt(priceDiv.textContent.replace(/\D/g, "")); // Loại bỏ ký tự không phải số
    const unitPrice = totalPrice / quantity; // Giá từng đơn vị

    // Xử lý tăng/giảm số lượng
    if (isDecrease) {
      quantity = Math.max(0, quantity - 1); // Không giảm dưới 0
    } else {
      quantity++;
    }

    // Cập nhật giá tiền và số lượng
    const newTotalPrice = quantity * unitPrice; // Tổng giá mới
    priceDiv.textContent = `${new Intl.NumberFormat("vi-VN").format(newTotalPrice)}đ`;
    quantitySpan.textContent = quantity;

    // Nếu số lượng = 0, xóa div lớn
    if (quantity === 0 && isDecrease) {
      productCard.remove(); // Xóa toàn bộ div lớn
      deleteProductFromDB(productId); // Gọi hàm xóa sản phẩm với id
    } else {
      addToCart2(productId, quantity); // Gọi hàm cập nhật số lượng với id
    }
  }
});


function deleteProductFromDB(productId) {
  // Gọi API xóa sản phẩm
  fetch("index.php?controller=cart&action=remove&idProduct=" + encodeURIComponent(productId))
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        alert("Đã xóa sản phẩm khỏi giỏ hàng!");
        location.reload(); // Tải lại trang sau khi xóa
      } else {
        alert("Có lỗi xảy ra, vui lòng thử lại!");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Có lỗi xảy ra, vui lòng thử lại!");
    });
}

// Sản phẩm gọi ý
function renderProducts(products, sectionId) {
  // Tìm tất cả các section theo ID (sử dụng querySelectorAll vì có thể có nhiều section)
  const sections = document.querySelectorAll(sectionId);

  if (sections.length === 0) {
    console.error(`Không tìm thấy section với selector: ${sectionId}`);
    return;
  }

  // Tạo chuỗi HTML cho tất cả sản phẩm
  let productHTML = "";
  products.forEach((product) => {
    productHTML += `
            <div class="suggestions-card">
                <img alt="" class="suggestions-card-img" height="100" src="${
                  product.image_link
                }" width="150"/>
                <div class="suggestions-card-body">
                    <h5 class="suggestions-card-title">${product.name}</h5>
                    <p class="suggestions-card-price">${new Intl.NumberFormat(
                      "vi-VN"
                    ).format(Math.floor(product.price))}đ</p>
                    <button onclick="addToCart(${
                      product.id
                    })" class="btn suggestions-card-add w-100">Thêm</button>
                </div>
            </div>
        `;
  });

  // Lặp qua tất cả các section và thêm sản phẩm vào trong đó
  sections.forEach((section) => {
    section.innerHTML = productHTML;
  });
}

fetch("index.php?controller=product&action=listSnackProducts")
  .then((response) => response.json())
  .then((data) =>
    renderProducts(data.products, ".suggestions-card-deck.d-flex")
  );

function addToCart(product_id, quantity = 1) {
  const data = new FormData();
  data.append("product_id", product_id);
  data.append("quantity", quantity);

  // Gọi API thêm sản phẩm vào giỏ hàng
  fetch("index.php?controller=user&action=addToCart", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        alert("Đã thêm sản phẩm vào giỏ hàng!");
        location.reload(); // Tải lại trang sau khi thêm
      } else {
        alert("Có lỗi xảy ra, vui lòng thử lại!");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Có lỗi xảy ra, vui lòng thử lại!");
    });
}

function addToCart2(product_id, quantity) {
  const data = new FormData();
  data.append("product_id", product_id);
  data.append("quantity", quantity);

  // Gọi API thêm sản phẩm vào giỏ hàng
  fetch("index.php?controller=cart&action=updateQuantity", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        alert("Đã thêm sản phẩm vào giỏ hàng!");
        location.reload(); // Tải lại trang sau khi thêm
      } else {
        alert("Có lỗi xảy ra, vui lòng thử lại!");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Có lỗi xảy ra, vui lòng thử lại!");
    });
}

// Discount
function addDiscount() {
  // Lấy tất cả giá trị từ các input có class .form-control
  const discountCodes = Array.from(
    document.querySelectorAll(".form-control")
  ).map((e) => e.value);

  // Tạo danh sách các Promise cho từng API gọi
  const fetchPromises = discountCodes.map((code) =>
    fetch(
      "index.php?controller=user&action=getDiscountByCode&code=" +
        encodeURIComponent(code)
    ).then((response) => response.json())
  );

  // Đợi tất cả các Promise hoàn thành
  Promise.all(fetchPromises)
    .then((results) => {
      let isValidDiscount = false; // Biến kiểm tra có mã giảm giá hợp lệ hay không
      let validDiscount = null; // Mã giảm giá hợp lệ

      results.forEach((result) => {
        if (result.status === "success") {
          isValidDiscount = true;
          validDiscount = result.discount; // Lưu mã giảm giá hợp lệ
        }
      });

      console.log(validDiscount.code);
      console.log(validDiscount.percentage);

      if (isValidDiscount) {
        let d = document.querySelectorAll("#discount");
        d.forEach((e) => {
          e.textContent =
            Number(validDiscount.percentage * 100).toLocaleString() + "%";
        });
        let c = document.querySelectorAll("#discount-code");
        c.forEach((e) => {
          e.textContent = validDiscount.code;
        });
        let t = document.querySelectorAll("#total");
        t.forEach((e) => {
          let r = document.querySelector("#total-real");

          const originalTotal = parseFloat(
            r.textContent.replace(/[^\d.-]/g, "")
          ); // Lấy giá trị số từ chuỗi
          console.log(originalTotal);
          const newTotal = originalTotal * 1000 * (1 - validDiscount.percentage) + 10000; // Áp dụng giảm giá
          console.log(newTotal);
          console.log(validDiscount.percentage);
          e.textContent = newTotal.toLocaleString() + "đ"; // Định dạng lại thành chuỗi
        });
      } else {
        let d = document.querySelectorAll("#discount");
        d.forEach((e) => {
          e.textContent = Không;
        });
        let t = document.querySelectorAll("#total");
        t.forEach((e) => {
          let r = document.querySelector("#total-real");

          const originalTotal = parseFloat(
            r.textContent.replace(/[^\d.-]/g, "")
          ); // Lấy giá trị số từ chuỗi
          const newTotal = originalTotal + 10000; // Áp dụng giảm giá
          e.textContent = newTotal.toLocaleString() + "đ"; // Định dạng lại thành chuỗi
        });
        alert("Mã khuyến mãi không chính xác");
      }
    })
    .catch((error) => {
      console.error("Lỗi khi kiểm tra mã giảm giá:", error);
      alert("Đã xảy ra lỗi. Vui lòng thử lại!");
    });
}

fetch("index.php?controller=store&action=getAllStores")
  .then((response) => response.json())
  .then((data) => {
    const storeDropdown = document.querySelectorAll("#store-address");
    if (data && data.stores && data.stores.length > 0) {
      storeDropdown.forEach((e) => {
        // Xóa các option hiện có nếu cần
        e.innerHTML = "";

        // Tạo các option từ dữ liệu fetch
        data.stores.forEach((store) => {
          const option = document.createElement("option");
          option.value = store.id; // ID nhà hàng
          option.textContent = `${store.name} - ${store.address}`; // Tên và địa chỉ
          e.appendChild(option);
        });
      });
    } else {
      // Thêm option mặc định nếu không có nhà hàng
      storeDropdown.forEach((e) => {
        // Xóa các option hiện có nếu cần
        e.innerHTML = '<option value="">Không có nhà hàng khả dụng</option>';
      });
    }
  });

fetch("index.php?controller=user&action=getAddresses")
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
    const addressDropdown = document.querySelectorAll("#home-address");
    if (data && data.addresses && data.addresses.length > 0) {
      addressDropdown.forEach((e) => {
        // Xóa các option hiện có nếu cần
        e.innerHTML = "";

        // Tạo các option từ dữ liệu fetch
        data.addresses.forEach((address) => {
          const option = document.createElement("option");
          option.value = address.id; // ID nhà hàng
          option.textContent = address.address; // Tên và địa chỉ
          e.appendChild(option);
        });
      });
    } else {
      // Thêm option mặc định nếu không có nhà hàng
      addressDropdown.forEach((e) => {
        // Xóa các option hiện có nếu cần
        e.innerHTML =
          '<option value="">Không có địa chỉ khả dụng, vui lòng thêm địa chỉ ở profile</option>';
      });
    }
  });

function pay() {
  const data = new FormData();

  const store = document.getElementById("store-address");
  const store_id = store.value;
  data.append("store_id", store_id);

  const d = document.getElementById("discount-code");
  const discount = d.textContent;
  data.append("discount_code", discount);

  const home = document.getElementById("home-address");
  const home_id = home.value;
  data.append("delivery_address", home_id);

  // Gọi API thêm sản phẩm vào giỏ hàng
  fetch("index.php?controller=user&action=checkout", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        alert("Đã tạo đơn hàng thành công!");
        location.reload(); // Tải lại trang sau khi thêm
      } else {
        alert("Có lỗi xảy ra, vui lòng thử lại!");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Có lỗi xảy ra, vui lòng thử lại!");
    });
}
