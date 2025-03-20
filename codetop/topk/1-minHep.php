<?php

class MinHeap {
    public $count;

    public $container;

    public function __construct()
    {
        $this->count = 0;
        $this->container = [0];
    }

    public function insert($num)
    {
        $this->count++;
        $this->container[$this->count] = $num;

        $this->buildHeap($this->count);
    }

    public function top()
    {
        if ($this->count == 0) return  0;

        return $this->container[1];
    }

    public function count()
    {
       return $this->count;
    }


    public function extract()
    {
        if ($this->count == 0) return  null;

        $top = $this->container[1];
        $this->container[1] = $this->container[$this->count];
        $this->count--;
       // $this->buildHeap($this->count);
        $this->buildHeapFromTop(1);


        return  $top;
    }

    public function buildHeap($idx)
    {
        while (intval($idx/2) > 0  && $this->container[intval($idx/2)] > $this->container[$idx]) {
            $this->swap(intval($idx/2), $idx);
            $idx = intval($idx/2);
        }
    }

    public function buildHeapFromTop($i)
    {
            while (true) {
                $min = $i;
                if (2 * $i <= $this->count && $this->container[$min] > $this->container[2*$i]) {
                    $min = 2 * $i;
                }

                if ((2 * $i + 1) <= $this->count && $this->container[$min] > $this->container[2*$i+1]) {
                    $min = 2 * $i + 1;
                }

                if ($min == $i) break;

                $this->swap($min, $i);
                $i  = $min;
            }
    }

    public function swap($i, $j)
    {
        $tmp = $this->container[$i];
        $this->container[$i] = $this->container[$j];
        $this->container[$j] = $tmp;
    }
}

$heap = new MinHeap();
$arr = [3,2,3,1,2,4,5,5,6,7,7,8,2,3,1,1,1,10,11,5,6,2,4,7,8,5,6];
foreach ($arr as $index => $num) {
    $heap->insert($num);
  //  echo "{$heap->count()}, {$num}--->" . json_encode($heap->container) . PHP_EOL;
}



while ($heap->count > 0) {
    echo  "{$heap->count}---->." . json_encode($heap->container) . ", extract:" . $heap->extract() . PHP_EOL;
}

//var_dump($heap->container, $heap->top(), $heap->count());
//var_dump($heap->container);