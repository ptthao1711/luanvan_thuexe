
<body>
     <div class="app">
     @extends('header')

     </div>
     <div class="container1">  
        
    </div>
</body>

<div class="container">  
{{ csrf_field() }}
<link rel="stylesheet" href="css/news.css" />
        <h1 >Đăng Tin</h1>  
        <form action="/submit-form" method="POST">  
            <div class="form-group">  
                <label for="title">Tiêu đề:</label>  
                <input type="text" id="title" name="title" required>  
            </div>  
            <div class="form-group">  
                <label for="category">Danh mục:</label> 
               
                <select id="category" text="Chọn danh mục" name="category" required>  
                @if(isset($allcate)&& count($allcate) > 0)
                @foreach($allcate as $key => $cate) 
                    <option value="{{$cate->ID_LOAI}}">{{$cate->TEN_LOAI}}</option> 
                  
  
                    <!-- Thêm các danh mục khác nếu cần --> 
                @endforeach
                @else
                  <p> Không có dữ liệu</p> 
                @endif
                </select>  
            </div>  
            <div class="form-group">  
                <label for="price">Giá:</label>  
                <input type="number" id="price" name="price" required>  
            </div>  
            <div class="form-group">  
                <label for="description">Mô tả:</label>  
                <textarea id="description" name="description" rows="4" required></textarea>  
            </div>  
            <div class="form-group">  
                <label for="contact">Thông tin liên hệ:</label>  
                <input type="text" id="contact" name="contact" required>  
            </div>  
            <div class="form-group">  
                <div class="group-f">
                <label for="image">Tải lên hình ảnh:</label>  
                <input type="file" id="image" name="image" accept="image/*">  
                </div>
            </div>  
            <button type="submit">ĐĂNG TIN</button>  
        </form>  
    </div>  

<div class="fromnews">
    <div class="froms">
        <div class="newspost">
            <div class="formimages">
                <h5>
                    Hình ảnh và video sản phẩm
                </h5>
                <p class="trc">
                    Xem thêm về 
                    <a>Quy định đăng tin </a>
                </p>

            </div>
            <div class="images">
                <div role="presentation">
                    <div class="rol">
                        <svg xmlns="http://www.w3.org/2000/svg" width="53" height="39" viewBox="0 0 53 39">
                        <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                            <g stroke="#FF8800" stroke-width="2" transform="translate(-255 -179)"><g transform="translate(132 122)"><path d="M150.631 87.337c-5.755 0-10.42-4.534-10.42-10.127 0-5.593 4.665-10.127 10.42-10.127s10.42 4.534 10.42 10.127c0 5.593-4.665 10.127-10.42 10.127m10.42-24.755l-2.315-4.501h-16.21l-2.316 4.5h-11.579s-4.631 0-4.631 4.502v22.505c0 4.5 4.631 4.5 4.631 4.5h41.684s4.631 0 4.631-4.5V67.083c0-4.501-4.631-4.501-4.631-4.501h-9.263z"></path></g></g></g>

                        </svg>
                        <span class="f6ete4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 21">
                                <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                                    <g fill="#FF8800" transform="translate(-161 -428)">
                                        <g transform="translate(132 398)">
                                            <g transform="translate(16.648 17.048)">
                                                <g transform="rotate(-180 16.142 16.838)">
                                                    <rect width="2.643" height="19.82" x="8.588" y="0" rx="1.321">

                                                    </rect>
                                                    <path d="M9.91 0c.73 0 1.321.592 1.321 1.321v17.177a1.321 1.321 0 01-2.643 0V1.321C8.588.591 9.18 0 9.91 0z" transform="rotate(90 9.91 9.91)">

                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </span>
                    </div>
                    <div class="s1sn01m8">
                        <p class="t1jq83vt">ĐĂNG TỪ 01 ĐẾN 20 HÌNH</p>
                    </div>

                </div>
                <div>

                </div>

            </div>

        </div>
    </div>

</div>
