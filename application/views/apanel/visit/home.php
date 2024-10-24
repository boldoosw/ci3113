<title>Хандалт</title>
<div class="container">
    <div id="body" class="pt-5 ml-72 mt-20 w-full">
        <table cellpadding="15" border="1" align="left" cellspacing="0">
            <tr class='tablebody'>
                <td>Өнөөдөр</td>
                <td><?=$today[0]->viewcount;?></td>
            </tr>
            <tr class='tablebody'>
                <td>Өчигдөр</td>
                <td><?=$yesterday[0]->viewcount;?></td>
            </tr>
            <tr class='tablebody'>
                <td>Сүүлийн 7 хоногт</td>
                <td><?=$privweekend[0]->viewcount;?></td>
            </tr>
            <tr class='tablebody'>
                <td>Сүүлийн сард</td>
                <td><?=$privmonth[0]->viewcount;?></td>
            </tr>
            <tr class='tablebody'>
                <td>Нийт</td>
                <td><?=$all[0]->viewcount;?></td>
            </tr>
        </table>
        </form>
    </div>
</div>
</body>

</html>