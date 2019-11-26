<?php
declare(strict_types=1);
/**
 * @param string $admin
 * @return bool
 */
function confirmarAdmin(string $admin):bool {
    if ($admin === 'admin')
        return true;
    else
        return false;
}