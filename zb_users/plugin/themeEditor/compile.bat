mkdir aceorig
xcopy ace aceorig /e
cd ace
for %i in (*.js) do del %i && java -jar d:\command\compiler.jar --js ..\aceorig\%i --language_in=ECMASCRIPT5 --js_output_file %i
cd snippets
for %i in (*.js) do del %i && java -jar d:\command\compiler.jar --js ..\..\aceorig\snippets\%i --language_in=ECMASCRIPT5 --js_output_file %i
