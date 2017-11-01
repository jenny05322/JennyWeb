<?php

namespace App\Maze;

class Answer
{
    // A-star
    private $_open;
    private $_closed;
    private $_start;
    private $_end;
    private $_grids;
    private $_w;
    private $_h;

    // Construct
    public function Answer(){
        $this->_w = null;
        $this->_h = null;
        $this->_grids = null;
    }

    public function set($width, $height, $grids) {
        $this->_w = $width;
        $this->_h = $height;
        $this->_grids = $grids;
        return $this;
    }

    // 迷宫中寻路
    public function search($start = false, $end = false) {
        return $this->_search($start, $end);
    }

    /**
    |---------------------------------------------------------------
    | 自动寻路 - A-star 算法
    |---------------------------------------------------------------
    */
    public function _search($start = false, $end = false) {
        if ( $start !== false ) $this->_start = $start;
        if ( $end !== false ) $this->_end = $end;

        $_sh = $this->_getH($start);

        $point['i'] = $start;
        $point['f'] = $_sh;
        $point['g'] = 0;
        $point['h'] = $_sh;
        $point['p'] = null;
        $this->_open[] = $point;
        $this->_closed[$start] = $point;

        while ( 0 < count($this->_open) ) {
            $minf = false;
            // 查找最小F
            foreach( $this->_open as $key => $maxNode ) {
                if ( $minf === false || $minf > $maxNode['f'] ) {
                    $minIndex = $key;
                }
            }

            // 取出最新F的点
            $nowNode = $this->_open[$minIndex];
            unset($this->_open[$minIndex]);
            // 已经找着
            if ( $nowNode['i'] == $this->_end ) {
                $tp = array();
                // 从链表中取出所有点放到查询结构中
                while( $nowNode['p'] !== null ) {
                    array_unshift($tp, $nowNode['p']);
                    $nowNode = $this->_closed[$nowNode['p']];
                }
                array_push($tp, $this->_end);
                break;
            }
            $this->_setPoint($nowNode['i']);
        }

        $this->_closed = array();
        $this->_open = array();

        return $tp;
    }

    private function _setPoint($me) {
        $point = $this->_grids[$me];

        // 所有可选方向入队列
        if ( $point & 1 ) {
            $next = $me - $this->_w;
            $this->_checkPoint($me, $next);
        }
        if ( $point & 2 ) {
            $next = $me + 1;
            $this->_checkPoint($me, $next);
        }
        if ( $point & 4 ) {
            $next = $me + $this->_w;
            $this->_checkPoint($me, $next);
        }
        if ( $point & 8 ) {
            $next = $me - 1;
            $this->_checkPoint($me, $next);
        }
    }

    private function _checkPoint($pNode, $next) {
        if ( isset($this->_closed[$next]) && $this->_closed[$next] ) {
            $_g = $this->_closed[$pNode]['g'] + $this->_getG($next);
            // 如果路径有更好的，更新
            if ( $_g < $this->_closed[$next]['g'] ) {
                $this->_closed[$next]['g'] = $_g;
                $this->_closed[$next]['f'] = $this->_closed[$next]['g'] + $this->_closed[$next]['h'];
                $this->_closed[$next]['p'] = $pNode;
            }
        } else {
            $point['p'] = $pNode;
            $point['h'] = $this->_getH($next);
            $point['g'] = $this->_getG($next);
            $point['f'] = $point['h'] + $point['g'];
            $point['i'] = $next;
            $this->_open[] = $point;
            $this->_closed[$next] = $point;
        }
    }

    // G -> 从起点 A 移动到指定方格的移动代价，沿着到达该方格而生成的路径
    private function _getG($point) {
        return abs($this->_start - $point);
    }

    // H -> 从指定的方格移动到终点 B 的估算成本
    private function _getH($point) {
        return abs($this->_end - $point);
    }
}
