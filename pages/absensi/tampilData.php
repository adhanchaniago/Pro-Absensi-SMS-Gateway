<?php
foreach ($data as $no => $row) :
?>
    <tr>
        <td>99999999999</td>
        <td>
            <input type="hidden" name="idMhs" id="idMhs">
            <span>Egova Riva Gustino</span>
        </td>
        <td></td>
        <td><input type="radio" value="0" name="status[]"></td>
        <td><input type="radio" value="1" name="status[]"></td>
        <td><input type="radio" value="2" name="status[]"></td>
        <td width=" 150"><textarea name="ket" id="ket" cols="30" rows="2"></textarea></td>
    </tr>
<?php endforeach ?>