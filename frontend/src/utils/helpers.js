export function getJoinedData (data = []) {
  return data.map(item => {
    return item.name;
  }).join(', ');
}