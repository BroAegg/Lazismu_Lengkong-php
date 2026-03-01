@echo off
echo ========================================
echo   GIT PUSH TO MAIN BRANCH
echo ========================================
echo.

cd /d "%~dp0"

echo Adding all changes...
git add -A

echo.
echo Committing changes...
git commit -m "Add performance fix and move project scripts"

echo.
echo Pushing to main branch...
git push origin main

echo.
echo ========================================
echo   PUSH COMPLETED!
echo ========================================
pause
