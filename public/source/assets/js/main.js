
function MyEle(id){
    return document.getElementById(id);
}

function onDangNhap(){
    var formDK = MyEle("form-dk");
    var formDN = MyEle("form-dn");
    formDN.style.display = "block";
    formDK.style.display = "none"; 
}

function onDangKy(){
    var formDK = MyEle("form-dk");
    var formDN = MyEle("form-dn");
    formDK.style.display = "block";
    formDN.style.display = "none";
    
    if(Validation()==true){
        swal({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success",
          });
    }else{
        swal("Vui lòng điền đầy đủ thông tin!", {
            className: "red-bg",
           
          });
    }
    
}

// function Validation(){
//         var bool = true;
//         if(!KiemTraRong("txtTK","tbUserName","")){
//         bool = false;
//     }else{
//         if(!KiemTraDinhDangChu("txtTK","tbUserName","")){
//             bool = false;   
//         }
//     }
//     if(!KiemTraRong("txtMK","tbPassword","")){
//         bool = false;
//     }else{
//         if(!TatCaLaSo("txtMK","tbPassword","Vui lòng nhập PASSWORD là số") || !KiemTraChieuDaiKyTu("txtMK","tbPassword","Vui lòng nhập PASSWORD từ ",8,15)){
//             bool = false;
//         }
//     }
//     if(!KiemTraRong("txtHT","tbHoTen","Vui lòng nhập FULLNAME")){
//         bool = false;
//     }else{
//         if(!KiemTraDinhDangChu("txtHT","tbHoTen","Vui lòng nhập FULLNAME là chữ!")){
//             bool = false;   
//         }
//     }
//     if(!KiemTraRong("txtEmail","tbEmail","Vui lòng nhập EMAIL")){
//         bool = false;
//     }else{
//         if(!KiemTraDinhDangMail("txtEmail","tbEmail","Vui lòng nhập EMAIL là abc@gmail.com!")){
//             bool = false;   
//         }
//     }
//     if(!KiemTraRong("txtPhone","tbPhoneNumber","Vui lòng nhập PHONE NUMBER gồm 10 số")){
//         bool = false;
//     }else{
//         if(!TatCaLaSo("txtPhone","tbPhoneNumber","Vui lòng nhập PHONE NUMBER là số")){
//             bool = false;
//         }
//     }
//     return bool;
// }



function KiemTraRong(idField, idThongBao, tbContent){
    var bool = true;
    var value_input = MyEle(idField).value;
    if(value_input === ""){
        MyEle(idThongBao).innerHTML = tbContent;
        bool = false;
    }else{
        MyEle(idThongBao).innerHTML = "";
    }
    return bool;
}

// function TatCaLaKyTu(idField, idThongBao, tbContent){
//     var bool = true;
//     var value_input = MyEle(idField).value;
//     var letters = /^[A-Za-z]+$/; 
//     if(value_input.match(letters)){
//         MyEle(idThongBao).innerHTML = "";
//     } else{
//         MyEle(idThongBao).innerHTML = tbContent;
//         bool = false;
//     }
//     return bool;
// }

function TatCaLaSo(idField, idThongBao, tbContent){
    var bool = true;
    var value_input = MyEle(idField).value;
    var numbers = /^[0-9]+$/; 
    if(value_input.match(numbers)){
        MyEle(idThongBao).innerHTML = "";
    } else{
        MyEle(idThongBao).innerHTML = tbContent;
        bool = false;
    }
    return bool;
}

function KiemTraDinhDangMail(idField, idThongBao, tbContent){
    var bool = true;
    var value_input = MyEle(idField).value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(value_input.match(mailformat)){
        MyEle(idThongBao).innerHTML = "";
    }else{
        MyEle(idThongBao).innerHTML = tbContent;
        bool = false;
    }
    return bool;
}

function KiemTraChieuDaiKyTu(idField, idThongBao, tbContent, min, max){
    var bool = true;
	var value_input = MyEle(idField).value;
	if(value_input.length < min || value_input.length > max){
		MyEle(idThongBao).innerHTML = tbContent + min + " tới " + max + " ký tự";
		bool = false;
	}
	else{
		MyEle(idThongBao).innerHTML = "";
	}
	return bool;
}

function KiemTraDinhDangChu(idField, idThongBao, tbContent){
	var bool = true;
	var value_input = MyEle(idField).value;
	var patt = new RegExp("^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶ" +
	"ẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợ" +
	"ụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\\s]+$");
	if(!patt.test(value_input)){
		MyEle(idThongBao).innerHTML = tbContent;
		bool = false;
	}
	else{
		MyEle(idThongBao).innerHTML = "";
	}
	return bool;
}