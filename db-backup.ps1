$TS = Get-Date -Format "yyyyMMdd_HHmmss"; docker exec devhouse-db sh -c 'exec mysqldump -uroot -ppassword devhouse_site' | Out-File -FilePath "db/devhouse_backup_${TS}.sql" -Encoding utf8
