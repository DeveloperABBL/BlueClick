<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/layout.js') }}"></script>
<script src="{{ asset('assets/libs/particles.js/particles.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('assets/libs/@tarekraafat/autocomplete.js/autoComplete.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('plugins/select2-4.1.0-rc.0/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/signature_pad/signature_pad.min.js') }}"></script>
<script src="{{ asset('assets/libs/aos/aos.js') }}"></script>
<script src="{{ asset('assets/js/pages/animation-aos.init.js') }}"></script>
<script src="{{ asset('assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ asset('assets/libs/cleave.js/cleave.min.js') }}"></script>
<script src="{{ asset('plugins/html2canvas/html2canvas.min.js') }}"></script>
<script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

{{-- <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script> --}}
<!-- ✅ DataTables -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<!-- ✅ JSZip สำหรับ Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- ✅ DataTables Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://www.ninenik.com/js/vfs_fonts.js"></script>

<!-- Moment.js -->
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- Daterangepicker JS -->
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- Modern colorpicker bundle -->
<script src="{{ asset('assets/libs/@simonwep/pickr/pickr.min.js') }}"></script>

<!-- init js -->
<script src="{{ asset('assets/js/pages/form-pickers.init.js') }}"></script>

<input type="text" class="d-none" id="inputCopy">
<script>
    $(document).ready(function() {
        localStorage.getItem("menu") ===
            document.documentElement.getAttribute("data-sidebar-size") ?
            document.documentElement.setAttribute(
                "data-sidebar-size",
                "sm-hover-active"
            ) :
            (document.documentElement.getAttribute("data-sidebar-size"),
                document.documentElement.setAttribute(
                    "data-sidebar-size",
                    "sm-hover"
                ));

    });
    pdfMake.fonts = {
        THSarabun: {
            normal: 'THSarabun.ttf',
            bold: 'THSarabun-Bold.ttf',
            italics: 'THSarabun-Italic.ttf',
            bolditalics: 'THSarabun-BoldItalic.ttf'
        }
    };
    $("#vertical-hover").click(function(e) {
        if (localStorage.getItem("menu") == "sm-hover") {
            console.log("sm-hover-active");
            localStorage.setItem("menu", "sm-hover-active");
        } else {
            console.log("sm-hover");
            localStorage.setItem("menu", "sm-hover");
        }
    });

    function dokeyup(obj) {
        var key = event.keyCode;
        if (key != 37 & key != 39 & key != 110) {
            var value = obj.value;
            var svals = value.split("."); //แยกทศนิยมออก
            var sval = svals[0]; //ตัวเลขจำนวนเต็ม

            var n = 0;
            var result = "";
            var c = "";
            for (a = sval.length - 1; a >= 0; a--) {
                c = sval.charAt(a);
                if (c != ',') {
                    n++;
                    if (n == 4) {
                        result = "," + result;
                        n = 1;
                    };
                    result = c + result;
                };
            };

            if (svals[1]) {
                result = result + '.' + svals[1];
            };
            obj.value = result;
        };
    };

    function checknumber() {
        key = event.keyCode;
        console.log(key);
        if (key != 46 & (key < 48 || key > 57) && key != 43) {
            event.returnValue = false;
        };
    };
    $(".input-number").keypress(function(event) {
        checknumber();
    });
    $(".input-number").change(function(event) {
        dokeyup(this);
    });
    $("input[type='email']").keypress(function(event) {
        const regex = /^[a-zA-Z0-9@._%+-]$/;
        const key = String.fromCharCode(event.which);

        // ถ้าตัวอักษรที่กดไม่ตรงกับ regex ให้ยกเลิกการพิมพ์
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });

    function inputNumber(number) {
        if (number != "") {
            return parseFloat(number.replace(/,/g, ''));
        } else {
            return 0;
        }
    }

    function numberWithCommas(n, digits = 2) {
        if (n != "") {
            var parts = n.toFixed(digits).split(".");
            var num = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + (parts[1] ? "." + parts[1] : "");
            return num;
        } else {
            var text = 0;
            return text.toFixed(digits);
        }
    }

    function inputFileImage(input, value, show_position, old_file) {
        let fty = ["jpg", "jpeg", "png", "webp", "gif"];
        let permiss = 0;
        let file_type = value.split('.');
        file_type = file_type[file_type.length - 1].toLowerCase();
        if (jQuery.inArray(file_type, fty) !== -1) {
            if (show_position != "") {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $(show_position).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
            let fileName = value.split('\\').pop();

        } else if (value == "") {
            if (show_position != "") {
                $(show_position).attr('src', old_file);
            }
            $(input).val("");
        } else {
            Swal.fire({
                icon: 'error',
                title: 'อัพโหลดได้เฉพาะไฟล์นามสกุล (.jpg .jpeg .png) เท่านั้น!',
            });
            if (show_position != "") {
                $(show_position).attr('src', old_file);
            }
            $(input).val("");
            return false;
        }
    }

    function emailIsValid(email) {
        return /\S+@\S+\.\S+/.test(email)
    }

    function closeModalForm(button) {
        Swal.fire({
            title: "",
            text: "กรุณายืนยันยกเลิก",
            icon: "warning",
            showCancelButton: !0,
            customClass: {
                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                cancelButton: "btn btn-danger w-xs mt-2"
            },
            confirmButtonText: "ยืนยัน",
            cancelButtonText: "ยกเลิก",
            buttonsStyling: !1,
        }).then(function(t) {
            if (t.value) {
                $(button).parents('.modal').modal('hide');
            }
        })
    }

    function inputStep() {
        var t = document.getElementsByClassName("plus"),
            e = document.getElementsByClassName("minus"),
            n = document.getElementsByClassName("product");
        t && Array.from(t).forEach(function(t) {
            t.addEventListener("click", function(e) {
                parseInt(t.previousElementSibling.value) < e.target.previousElementSibling.getAttribute(
                    "max") && (e.target.previousElementSibling.value++, n)
            })
        }), e && Array.from(e).forEach(function(t) {
            t.addEventListener("click", function(e) {
                parseInt(t.nextElementSibling.value) > e.target.nextElementSibling.getAttribute(
                    "min") && (e.target.nextElementSibling.value--, n)
            })
        })
    }

    function btnDeleteTableRow(button) {
        $(button).parents('tr').remove();
    }

    function copyText(text) {
        document.getElementById("inputCopy").value = text;
        var copyText = document.getElementById("inputCopy");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        // toastr.success('Copied')
        Toastify({
            text: "Copied",
            gravity: "top",
            // position: 'center',
            style: {
                background: '#0f3443'
            }
        }).showToast();
    }

    function downloadFile(fileUrl) {
        fetch(fileUrl)
            .then(response => response.blob())
            .then(blob => {
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                var fileName = fileUrl.split('/').pop();
                a.download = fileName;
                document.body.appendChild(a);
                a.click();
                a.remove();
                window.URL.revokeObjectURL(url);
            })
            .catch(error => console.error('Download failed:', error));
    }

    function inputFileDoc(input, value) {
        let fty = ["jpg", "jpeg", "png", "pdf"];
        let permiss = 0;
        let file_type = value.split('.');
        file_type = file_type[file_type.length - 1].toLowerCase();
        if (jQuery.inArray(file_type, fty) !== -1) {
            let fileName = value.split('\\').pop();
        } else if (value == "") {
            $(input).val("");
        } else {
            Swal.fire({
                icon: 'error',
                title: 'อัพโหลดได้เฉพาะไฟล์นามสกุล (.jpg .jpeg .png .pdf) เท่านั้น!',
            });
            $(input).val("");
            return false;
        }
    }

    function inputFileXlsx(input, value) {
        let fty = ["xlsx"];
        let permiss = 0;
        let file_type = value.split('.');
        file_type = file_type[file_type.length - 1].toLowerCase();
        if (jQuery.inArray(file_type, fty) !== -1) {
            let fileName = value.split('\\').pop();
        } else if (value == "") {
            $(input).val("");
        } else {
            Swal.fire({
                icon: 'error',
                title: 'อัพโหลดได้เฉพาะไฟล์นามสกุล (.xlsx) เท่านั้น!',
            });
            $(input).val("");
            return false;
        }
    }

    function inputFileCsv(input, value) {
        let fty = ["csv"];
        let permiss = 0;
        let file_type = value.split('.');
        file_type = file_type[file_type.length - 1].toLowerCase();
        if (jQuery.inArray(file_type, fty) !== -1) {
            let fileName = value.split('\\').pop();
        } else if (value == "") {
            $(input).val("");
        } else {
            Swal.fire({
                icon: 'error',
                title: 'อัพโหลดได้เฉพาะไฟล์นามสกุล (.csv) เท่านั้น!',
            });
            $(input).val("");
            return false;
        }
    }

    function formatDate(isoDate) {
        if (isoDate !== "null" && isoDate !== "") {
            var dateParts = isoDate.split("-"); // แยกวันที่ตาม "-" เช่น ["2024", "09", "12"]
            return dateParts[2] + "/" + dateParts[1] + "/" + dateParts[0]; // จัดเรียงใหม่เป็น dd/mm/yyyy
        } else {
            return '';
        }
    }

    function getParameterByName(name, url = window.location.href) {
        name = name.replace(/[\[\]]/g, "\\$&");
        let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    function RemoveComma(value) {
        return value.replace(/,/g, '');
    }

    function setTextCommaToNumber(value) {
        if (value != "") {
            let text = value.replace(/,/g, '');
            return parseFloat(text);
        } else {
            return 0;
        }
    }

    function deleteTableRow(button) {
        $(button).parents('tr').remove();
    }

    function calculateDays(startDay, endDay) {
        var start = new Date(startDay);
        var end = new Date(endDay);

        if (isNaN(start) || isNaN(end)) {
            return 0;
        }

        var timeDiff = end.getTime() - start.getTime();
        var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)); // ถ้ารวมวันแรก: +1

        return daysDiff;
    }

    function ImageReadURL(input, value, show_position, old_file) {
        let fty = ["jpg", "jpeg", "png", "gif"];
        let permiss = 0;
        let file_type = value.split('.');
        file_type = file_type[file_type.length - 1].toLowerCase();
        if (jQuery.inArray(file_type, fty) !== -1) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $(show_position).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else if (value == "") {
            $(show_position).attr('src', old_file);
            $(input).val("");
        } else {
            Swal.fire({
                icon: 'error',
                title: 'อัพโหลดได้เฉพาะไฟล์นามสกุล (.jpg .jpeg .png .gif) เท่านั้น!',
            });
            $(show_position).attr('src', old_file);
            $(input).val("");
            return false;
        }
    }
</script>
