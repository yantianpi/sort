# sort
数据结构中的基本排序算法php实现

## 排序算法介绍

* 冒泡排序

    冒泡排序，冒泡，就像水中的泡泡那样，冒一次泡，就可以将最大的值冒到水面上。冒泡排序即将待排序序列分为两部分，一部分为无序区，一部分为有序区，一次冒泡通过比较和交换相邻元素值的位置，使关键词中最大或最小的元素冒到顶，使得无序区记录减1，有序区记录加1，经过length-1次冒泡可以得到一个有序序列。
    
* 插入排序

    插入排序，将待排序序列分为两部分，一部分为无序区，一部分为有序区，插入排序即将无序区中一个元素插入到有序区的合适位置，使得有序区记录加1，无序区记录减1。经过length-1次插入可以得到一个有序序列。
    
* 希尔排序

    希尔排序，插入排序的增强版，将待排序的序列以一定的增量分组，对每组序列进行插入排序，逐步减小增量，使得每组序列记录变多，当增量减为1时，整个序列合成一组，再进行一次插入排序就可以得到一个有序序列。
    
* 选择排序

    选择排序，将待排序序列分为两部分，一部分无序区，一部分有序区，选择排序即在无序区中选择，选择其中最大或最小的值放到有序区，使得无序区记录减1，有序区记录加1，经过length-1次选择就可以得到一个有序序列。
    
* 堆排序

    堆排序，对满足完全n叉树特性的数列，给定某个节点的索引值，可以计算出该节点的孩子节点索引。堆排序的做法是将待排序数列划分为有序区和无序区，首先对无序区建堆（最大堆或最小堆，最大堆就是父亲节点的值大于孩子节点的值（如果存在孩子节点的话）），堆建好后，无序区的根节点上放的就是无序区中最大的值，然后交换无序区根节点与最后叶子节点的值，无序区长度减1，有序区长度加1，此时可能破坏了无序区中根节点的堆特性，需要保持根节点的堆特性，然后进入下一次堆排，进行length-1次堆排就可以得到一个有序序列。（`堆排序中只要对已有堆交换元素，就要保持交换后的节点依然满足堆特性；建堆从最后一个父亲节点开始，依次往前建`）
    
* 基排序

    基排序，借助桶排序（如果待排序的值比较小，最大值为max，可以构造max个桶，每个桶索引代表一个值，桶里存放等于该桶索引值的元素个数，初始为0，遍历待排序数列，根据元素值，对指定桶元素个数加加操作，最后对max个桶进行遍历，输出有序序列），基排序对待排序序列元素从低位到高位按位进行桶排序，首先从最低位开始，走访数位，将元素分配到0-9号桶中，同一位相同元素入同一个桶，桶内元素间相对顺序保持原序列元素相对顺序，一次桶排之后，将桶中数据重新串接起来，进行下一位桶排，直至到最高位完成桶排，将数据重新串接起来就得到有序序列。
    
* 归并排序

    归并排序，将待排序序列分为两部分，分别为A,B。先保证A,B分别有序（递归），然后将A,B合并成一个序列，归并排序即为合并的过程
    
* 快速排序

    快速排序，选取一个枢纽元，将数列分为两部分，小于枢纽元的元素放到枢纽元左边，大于枢纽元的元素放到枢纽元右边，然后分别对枢纽元左右两部分递归进行下一次排序，如果待排序元素个数少，可以选择插入排序或选择排序。
    