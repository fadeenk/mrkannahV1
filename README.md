execute `rm -rf ./static`
Use docker cli to get into the container and run

```shell
./php2html . ./static -ed node_modules -ed samples/mechatronics -ed samples/projectx
cd ./samples/mechatronics
../../php2html . ../../static/samples/mechatronics
cd ../projectx
../../php2html . ../../static/samples/projectx
```

commit and push
execute deploy script `npm run deploy`
