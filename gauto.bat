git status
git add .
set /p commitMsg=Whats the commit message?
git commit -m %commitMsg%
git push origin master

