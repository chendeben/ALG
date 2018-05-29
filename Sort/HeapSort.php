<?php
/**
 *  ������ (�����)
 * -------------------------------------------------------------
 *  ˼·�����������������˴���ѶѶ���¼�Ĺؼ�����󣨻���С����һ����
 * -------------------------------------------------------------
 *  ������(HeapSort)��ָ���öѻ������ѣ��������ݽṹ����Ƶ�һ�������㷨������ѡ�������һ�֡�
 *  ��������������ص���ٶ�λָ��������Ԫ�ء��ѷ�Ϊ����Ѻ�С���ѣ�����ȫ��������
 *  ����ѵ�Ҫ����ÿ���ڵ��ֵ���������丸�ڵ��ֵ����A[PARENT[i]] >= A[i]��������ķǽ��������У���Ҫʹ�õľ��Ǵ���ѣ�
 *  ��Ϊ���ݴ���ѵ�Ҫ���֪������ֵһ���ڶѶ���
 */

class HeapSort
{
    /**
     * @var int
     */
    protected $count;
    /**
     * @var array
     */
    protected $data;
    /**
     * HeapSort constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->count = count($data);
        $this->data  = $data;
    }
    /**
     * Action
     *
     * @return array
     */
    public function run()
    {
        $this->createHeap();
        while ($this->count > 0) {
            /* ����һ���󶥶� , ���ԶѶ��Ľڵ����������
               ���ݴ��ص� , ÿ�ζ����Ѷ������Ƶ����һλ
               Ȼ���ʣ�����ݽڵ��ٴν���ѾͿ��� */
            $this->swap($this->data[0], $this->data[--$this->count]);
            $this->buildHeap($this->data, 0, $this->count);
        }
        return $this->data;
    }
    /**
     * ����һ����
     */
    public function createHeap()
    {
        $i = floor($this->count / 2) + 1;
        while ($i--) {
            $this->buildHeap($this->data, $i, $this->count);
        }
    }
    /**
     * �� ���� �ĵ� $i ���ڵ㿪ʼ�� ���鳤��Ϊ0 ���� , �ݹ�Ľ��� ( �������ӽڵ� ) ת��Ϊһ��С����
     *
     * @param $data
     * @param $i
     * @param $count
     */
    public function buildHeap(array &$data, $i, $count)
    {
        if (false === $i < $count) {
            return;
        }
        // ��ȡ�� / �ҽڵ�
        $right = ($left = 2 * $i + 1) + 1;
        $max   = $i;
        // ������ӽڵ���ڵ�ǰ�ڵ� , ��ô��¼��ڵ����
        if ($left < $count && $data[$i] < $data[$left]) {
            $max = $left;
        }
        // ����ҽڵ���ڸոռ�¼�� $max , ��ô�ٴν���
        if ($right < $count && $data[$max] < $data[$right]) {
            $max = $right;
        }
        if ($max !== $i && $max < $count) {
            $this->swap($data[$i], $data[$max]);
            $this->buildHeap($data, $max, $count);
        }
    }
    /**
     * �����ռ�
     *
     * @param $left
     * @param $right
     */
    public function swap(&$left, &$right)
    {
        list($left, $right) = array ($right, $left);
    }
}

