<!--暂时无用-->
<?php
function check_input($value)
{
// 去除斜杠
    if (get_magic_quotes_runtime())
    {
        $value = stripslashes($value);
    }
// 如果不是数字则加引号
    if (!is_numeric($value))
    {
        $value = $conn->real_escape_string($value);
    }
    return $value;
}
