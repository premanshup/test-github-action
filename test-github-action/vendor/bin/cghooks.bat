@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../brainmaestro/composer-git-hooks/cghooks
php "%BIN_TARGET%" %*
