



<table width="100%">
    <tr>
        <td>
        <a href="main.php"><img src="rent.jpg" width="130" height="130"></a>
        </td>
        <td><h1>Alan's appartment</h1></td>

    </tr>


</table>
<div id="time"></div>

<script>
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        var hr=0;
        var amp;
        // add a zero in front of numbers<10
        if (h>12 && h<24){
            hr=h-12;
            amp="pm";
        }
            else{
            hr=h;
            amp="am";
        }
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('time').innerHTML = hr + ":" + m + ":" + s +" "+amp;
        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();
</script>

