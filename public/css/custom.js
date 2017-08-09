import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  '#instantclick-bar': {
    'background': '#000'
  },
  'downline-content': {
    'backgroundColor': 'white'
  },
  'sidebar-menu liactive>treeview-menu': {
    'display': 'block!important'
  },
  'node': {
    'cursor': 'pointer'
  },
  'node circle': {
    'fill': '#fff',
    'stroke': 'steelblue',
    'strokeWidth': '5px'
  },
  'node text': {
    'font': [{ 'unit': 'px', 'value': 12 }, { 'unit': 'string', 'value': 'sans-serif' }]
  },
  'link': {
    'fill': 'none',
    'stroke': '#ccc',
    'strokeWidth': '3px'
  }
});
