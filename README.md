# recruitment-php-code-test


题目1：php test.php查看效果；
题目2：单元测试包含，且修复一个函数问题（in_array->array_key_exists）
题目3：php test2.php查看效果；


题目4：
a、代码段太长；
b、返回值不规范，既有false，又有0，又可以为期望数据；
c、geoHelperAddress，Merchant是什么服务，该服务调用数据是否需要缓存？若需要，则存在缓存遗留；
d、geoHelperAddress，使用场景问题，如果是每个请求都需要调用该函数，有可能存在高并发下导致cache机制失效，同时，由于rpc调用error为非0时，同样失效，导致继续远程调用rpc，参考解决方案（假若低并发），当error非0时，仍然需要缓存，不过缓存时间可以设定为1min，正常数据缓存1小时等（具体看业务）；其次，架构调整的问题，例如，单点维护刷新全局坐标缓存（假定其基本稳定且可信任），归根到底还得看该函数调用的场景；

e、checkStatusCallback，状态数组存放方式问题，该统一，code_arr与open_status_arr意义一致，但是出现了多处，若后续出现新的状态修改，可能会导致问题；可以直接用open_status_arr，判断用array_key_exists，其他参考【b】，具体情况要结合业务场景才能作判断；