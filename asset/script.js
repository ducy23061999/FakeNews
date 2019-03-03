
document.addEventListener("DOMContentLoaded",function(){
    var title = document.getElementById('title');
    var desc = document.getElementById('desc');
    var image = document.getElementById('image');
    var ic_copy = document.getElementById('ic_copy');
    var result = document.getElementById('result');
    var btn = document.getElementById('btn-send');
    var loading = document.getElementById('loading');
    btn.onclick = function(){
        btn.classList.add('hide');
        loading.classList.remove('hide');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                setTimeout(function(){
                    loading.classList.add('hide');
                    btn.classList.remove('hide');
                    var dataArray = JSON.parse(xhttp.response);
                    if (dataArray.status){
                        var url = dataArray.url;
                        result.value = url;
                    
                    } else{
                        M.toast({html: 'Có gì đoá bị lỗi roài. Bug méo gì lắm thế'})
                    }
                },1000);
                
            
            }
        }

        xhttp.open("POST", "Kamehameha.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("title=" + title.value + "&desc=" + desc.value + "&image="+image.value);
    };

    ic_copy.onclick = function(){
        result.select();
        document.execCommand("copy");
        M.toast({html: 'Đã copy nek'})
    }
    
   
})